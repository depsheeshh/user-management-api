<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar semua pengguna berhasil diambil.',
            'data' => $users,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|numeric|min:10',
            'is_active' => 'required|boolean',
            'department' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Jika validasi gagal, kembalikan response error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal. Silahkan cek kembali inputan Anda.',
                'errors' => $validator->errors(),
            ], 422); 
        }

        // Membuat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_active' => $request->is_active,
            'department' => $request->department,
            // Password di-hash secara otomatis melalui mutator di model User
            'password' => $request->password
        ]);

        // Mengembalikan response JSON dengan data pengguna yang baru dibuat dan status code 201 (Created)
        return response()->json([
            'success' => true,
            'message' => 'Pengguna baru berhasil dibuat.',
            'data' => $user,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Kita cari user secara manual
    $user = User::find($id);

    if (!$user) {
        // Jika tidak ada, kita bisa buat response JSON kustom
        return response()->json([
            'success' => false,
            'message' => 'Pengguna tidak ditemukan.',
        ], 404);
    }

    // Jika ada, kita kirim datanya
    return response()->json([
        'success' => true,
        'message' => 'Detail pengguna berhasil diambil.',
        'data' => $user,
    ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Pengguna dengan ID ' . $id . ' tidak ditemukan.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => [
                'sometimes',
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => 'sometimes|required|string|numeric|min_digits:10',
            'is_active' => 'sometimes|required|boolean',
            'department' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data pengguna berhasil diperbarui.',
            'data' => $user,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Pengguna dengan ID ' . $id . ' tidak ditemukan.',
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pengguna berhasil dihapus.',
        ], 200);
    }
}

