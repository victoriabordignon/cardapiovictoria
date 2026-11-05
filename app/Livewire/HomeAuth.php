<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeAuth extends Component
{
    public string $mode = 'login';

    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public bool $remember = false;

    public function setMode(string $mode): void
    {
        if (! in_array($mode, ['login', 'register'], true)) {
            return;
        }

        $this->mode = $mode;
        $this->reset(['name', 'email', 'password', 'password_confirmation', 'remember']);
        $this->resetValidation();
    }

    public function authenticate()
    {
        if ($this->mode === 'register') {
            $data = $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = User::create($data);
            Auth::login($user);
        } else {
            $data = $this->validate([
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string'],
            ]);

            if (! Auth::attempt($data, $this->remember)) {
                $this->addError('email', 'Esses dados não correspondem a uma conta.');

                return;
            }
        }

        if (request()->hasSession()) {
            request()->session()->regenerate();
        }

        return $this->redirectRoute('admin');
    }

    public function render()
    {
        return view('livewire.home-auth');
    }
}