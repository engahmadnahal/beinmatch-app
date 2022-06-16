<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Mobara;
use Illuminate\Auth\Access\HandlesAuthorization;

class MobaraPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Employee $employee)
    {
        //
        return $employee->hasPermissionTo('Read-Match') ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Mobara  $mobara
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Employee $employee, Mobara $mobara)
    {
        //
        return $employee->hasPermissionTo('Read-Match') ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Employee $employee)
    {
        //
        return $employee->hasPermissionTo('Create-Match') ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Mobara  $mobara
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Employee $employee, Mobara $mobara)
    {
        //
        return $employee->hasPermissionTo('Update-Match') ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Mobara  $mobara
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Employee $employee, Mobara $mobara)
    {
        //
        return $employee->hasPermissionTo('Delete-Match') ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Mobara  $mobara
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Employee $employee, Mobara $mobara)
    {
        //
        return $employee->hasPermissionTo('Delete-Match') ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Mobara  $mobara
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Employee $employee, Mobara $mobara)
    {
        //
        return $employee->hasPermissionTo('Delete-Match') ? $this->allow() : $this->deny();
    }
}
