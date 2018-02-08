<?php namespace Bantenprov\BGBurukPerawatan\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The BGBurukPerawatan facade.
 *
 * @package Bantenprov\BGBurukPerawatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class BGBurukPerawatan extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bg-buruk-perawatan';
    }
}
