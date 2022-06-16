<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
        return $employee->hasPermissionTo("Read-Post") ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Employee $employee, Post $post)
    {
        //
        return $employee->hasPermissionTo("Read-Post") ? $this->allow() : $this->deny();

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

        return $employee->hasPermissionTo("Create-Post") ? $this->allow() : $this->deny();

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Employee $employee, Post $post)
    {
        //

        return $employee->hasPermissionTo("Update-Post") ? $this->allow() : $this->deny();

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Employee $employee, Post $post)
    {
        //

        return $employee->hasPermissionTo("Delete-Post") ? $this->allow() : $this->deny();

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Employee $employee, Post $post)
    {
        //
        return $employee->hasPermissionTo("Delete-Post") ? $this->allow() : $this->deny();

    }


}
