<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'mode',
        'point',
        'info',
        'updated_at',
        'created_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function attempt()
    {
        return $this->hasMany('\App\Models\UserAttempt', 'fk_attempt_userId', 'id');
    }

    /**
     * @return HasOne
     */
    public function bonus()
    {
        return $this->hasOne('\App\Models\Bonus', 'fk_bonus_userId', 'id');
    }

    /**
     * @param $id
     * @return RedirectResponse|int
     */
    public function storeUserPoint($id)
    {
        try {
            $user = User::find($id);
            $user->point = $user->point + 1;
            $user->save();
            return $user->point;
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }


}
