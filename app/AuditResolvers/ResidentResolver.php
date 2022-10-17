<?php
namespace App\AuditResolvers;

use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Resolver;

class ResidentResolver implements Resolver {
    
    public static function resolve(Auditable $auditable = null)
    {
        return auth()->user();
    }
}