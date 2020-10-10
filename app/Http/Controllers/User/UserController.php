<?php

namespace App\Http\Controllers\User;

use App\Exports\UsersExport;
use App\Models\auth\{
    Profession, Skill, User, UserFilter, UserProfile};
use App\Http\Requests\{CreateUserRequest, UpdateUserRequest};
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kamaln7\Toastr\Facades\Toastr;
use Maatwebsite\Excel\Excel;



class UserController extends Controller
{

    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }


    public function index(Request $request, UserFilter $filters)
    {
        $users = User::query()
            ->with('team', 'skills', 'profile.profession')
            ->filterBy($filters, $request->only(['state', 'role', 'search', 'skills', 'from', 'to']))
            ->orderByDesc('created_at')
            ->paginate(10);
        $users->appends($filters->valid());

        return view('users.index', [
            'view' => 'index',
            'users' => $users,
            'skills' => Skill::orderBy('name')->get(),
            'checkedSkills' => collect(request('skills')),
        ]);
    }

    public function trashed()
    {
        $users = User::onlyTrashed()->paginate();

        return view('users.index', [
            'users' => $users,
            'view' => 'trash',
        ]);
    }

    public function show(User $user)
    {
        return $this->form('users.show', $user);
    }


    public function create()
    {
        return $this->form('users.create', new User);
    }

    public function store(CreateUserRequest $request)
    {
        $request->createUser();
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return $this->form('users.edit', $user);
    }

    protected function form($view, User $user)
    {
        return view($view, [
            'professions' => Profession::orderBy('title', 'ASC')->get(),
            'skills' => Skill::orderBy('name', 'ASC')->get(),
            'user' => $user,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $request->updateUser($user);

        return redirect()->route('users.index', ['user' => $user]);
    }

    public function trash(User $user)
    {
        $user->delete();
        $user->profile()->delete();
        $message='El Usuario '.$user->name.' fue Borrado   '." <a href='users/restore/$user->id'> Click aqui </a> " .  'Para restaurar'  ;
        $title ="";
        Toastr::success($message, $title);
        return redirect()->route('users.index');   //->with("deleted" , $user );
    }

    public function destroy($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->firstOrFail();

        $user->forceDelete();
        $title = "";
        $message='El Usuario '.$user->name.' fue eliminado permanentemente';
        Toastr::success($message, $title);
        return redirect()->route('users.trashed');

    }
    public function restore( $id )
    {
        //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
        $user = User::withTrashed()->where('id', '=', $id)->first();
        //Restauramos el registro
        $user->restore();
        $userprofile = UserProfile::withTrashed()->where('id', '=', $id)->first();
        $userprofile->restore();
        $title = "";
        $message='El Usuario '.$user->name.' fue restaurado';
        Toastr::success($message, $title);
        return redirect()->route('users.index');
    }


    public function profile()
    {
        $user = Auth::user();
        return view('users.profile',compact('user',$user));
    }

    public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $user = Auth::user();
        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('avatars',$avatarName);
        $user->avatar = $avatarName;
        $user->save();
        $title = "";
        $message='Has subido exitosamente la imagen.';
        Toastr::success($message, $title);
        return back();

    }

    function Exports($id,$pd)
    {
        if ($pd <> 0) {
            $user = User::findOrFail($id);
            $date = date('d-m-Y');
            $pdf = PDF::loadView('users.exports.pdf_user', compact('user','date'));
        }
        if ($pd == 0) {
           return $this->excel->download((new UsersExport())->forYear(2018), 'users.xlsx');
        } elseif ($pd == 1) {
            return $pdf->download('user.pdf');
        } elseif ($pd == 2) {
            return $pdf->stream('user.pdf');
        }
    }
}
