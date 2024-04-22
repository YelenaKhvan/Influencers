<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle user registration.
     *
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createUser(CreateUserRequest $request)
    {   
        
        if(Auth::check()){
            return redirect(route('page.inner'));
        }
        
        $validated = $request->validated();
    
        $user = User::query()->create($validated);
        $validated['password'] = Hash::make($validated['password']);
    
        if($user){
            auth()->login($user);
            return redirect()->route('page.inner');
        } 
    
        return redirect()->route('page.login')->withErrors([
            'formError'=> "Ошибка при сохранении"
        ]);
    }
    

    /**
     * Handle user login.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginUser(LoginRequest $request)
    {
        // Проверяем, авторизован ли уже пользователь. Если да, перенаправляем на защищенную страницу.
        if (Auth::check()) {
            return redirect()->intended(route('page.inner'));
        }
    
        // Проверяем валидность входных данных
        $validated = $request->validated();
    
        // Пытаемся аутентифицировать пользователя
        if (auth()->attempt($validated)) {
            // Успешная аутентификация - перенаправляем на защищенную страницу
            return redirect()->route('page.inner');
        }
    
        // Неправильные учетные данные - возвращаем обратно с сообщением об ошибке
        return back()->withErrors(['invalid' => 'Неверный логин или пароль']);
    }
    
    /**
     * Handle user logout.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutUser(Request $request)
    {
        // Выполняем выход пользователя
        auth()->logout();
    
        // Перенаправляем на домашнюю страницу
        return redirect()->route('page.home');
    }
}
