<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//hash
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!auth()->user()->hasRole(['Administrador', 'CEO'])) {
            return response()->json(['message' => 'No tienes permiso para realizar esta acción.'], 403);
        }
    

        $users = User::all();
        return response()->json($users);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Credenciales incorrectas.'], 401);
        }
    
        $token = $user->createToken('auth_token_' . $user->id)->plainTextToken;
    
        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'access_token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone, // Teléfono
                'roles' => $user->getRoleNames(), // Obtener roles del usuario con Spatie

            ],
            'redirect_url' => '' // URL opcional para el cliente
        ], 200);

    }

    /**
     * Logout function
     */
    public function logout(Request $request){
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
            return response()->json(['message' => 'Sesión cerrada correctamente'], 200);
        } else {
            return response()->json(['message' => 'Usuario no autenticado'], 401);
        }
    }

    /**
     * Register a new user
     */
    
     public function store(UserRequest $request)
     {

        if (!auth()->user()->hasRole(['CEO'])) {
            return response()->json(['message' => 'No tienes permiso para realizar esta acción.'], 403);
        }
    
       
        $user = User::create($request->all());


        return response()->json([
            'message' => 'Usuario registrado',
            'user' => $user
        ], 201);
    
        }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::find($id);

        if($user){
            return response()->json($user);
        } else{
        return response()->json(['message'=> 'User not found'],404);
        }
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8',
            'phone' => 'nullable|string|max:255', // Assuming you have a phone field
            'role' => 'nullable|string|max:255', // Assuming you have a role field
        ]);

        try {
            $User = User::findOrFail($id); 

            $User->update($request->all() + ['phone' => $request->phone]);

            if ($User->wasChanged()) {
                return response()->json(['message' => 'User updated successfully', 'user' => $User], 200);
            } else {
                return response()->json(['message' => 'No changes were made to the user, check inputs'], 200);
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'User not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An unexpected error occurred. Please try again later.'], 500);
        }
        
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (!auth()->user()->hasRole(['Administrador', 'CEO'])) {
            return response()->json(['message' => 'No tienes permiso para realizar esta acción.'], 403);
        }
    
        //
        $user = User::find($id);
        if($user){
            $user->delete();
            return response()->json(['message' => 'User deleted']);
        } else{
            return response()->json(['message'=> 'Error deleting user'],404);
        }
    }

    /**
     * Search for a user by email
     */
    public function searchByEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user){
            return response()->json($user);
        } else{
            return response()->json(['message'=> 'User not found'],404);
        }
    }

    /**
     * Search for a user by name
     */
    public function search(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $user = User::where('name', 'like', '%'.$request->name.'%')->get();

        if($user){
            return response()->json($user);
        } else{
            return response()->json(['message'=> 'User not found'],404);
        }
    }

    /**
     * Update the password of a user
     */
    public function updatePassword(Request $request, string $id)
    {
        $request->validate([
           'password' => 'required|string|min:8',
        ]);
        $user = User::find($id);
        if($user){
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['message'=> 'Updated password'],200);
        } else{
            return response()->json(['message'=> 'Error updating password'],404);
        }
    }



}