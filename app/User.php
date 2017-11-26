<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;
use Hash;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $remember_token
*/
class User extends Authenticatable implements HasMediaConversions
{
    use Notifiable;
    use HasMediaTrait;

    protected $fillable = ['name', 'email', 'password', 'remember_token', 'role_id'];
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('resized')
            ->nonOptimized()
            ->height(50)
            ->width(50)
            ->nonQueued();
    }


    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }
}
