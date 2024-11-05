<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Auth\Database\Factories\PermissionFactory;

class Permission extends Model
{
    
        use HasFactory;

        protected $fillable = ['permission_name', 'description'];

        public function roles()
        {
            return $this->belongsToMany(Role::class, 'role_permissions');
        }
}
