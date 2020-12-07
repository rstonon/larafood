<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'price', 'description'];

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function search($filter = null)
    {
        $results = $this
                    ->where('name', 'LIKE', "%{$filter}%")
                    ->orWhere('description', 'LIKE', "%{$filter}%")
                    ->paginate();

        return $results;
    }

    public function modulesAvailable($filter = null)
    {
        $modules = Module::whereNotIn('modules.id', function($query) {
            $query->select('module_plan.module_id');
            $query->from('module_plan');
            $query->whereRaw("module_plan.plan_id={$this->id}");
        })
        ->where(function($queryFilter) use ($filter) {
            if ($filter) {
                $queryFilter->where('plan.name', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate();

        return $modules;
    }

}
