<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view)
        {
            if (Auth::check()){
                $user = User::findOrfail(Auth::id());
                $view->with('auth', $user);
//                $view->with('messages', Message::with('user')->where('user_id','=',Auth::id())->where('status','=',0)->get()->groupBy('subject'));
//                $allPermission = [];
//                foreach ($user->roll as $roll){
//                    foreach ($roll->permissions as $permission){
//                        $allPermission[] = $permission->name;
//                    }
//                }
//                if (is_array($allPermission)){
//                    $view->with('allPermission', $allPermission);
//                }
//                else{
//                    $view->with('allPermission', $allPermission->toArray());
//                }
            }
        });
    }
}
