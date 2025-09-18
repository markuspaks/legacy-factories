<?php

use Illuminate\Database\Eloquent\Factory;

if (! function_exists('factory')) {
    /**
     * Create a model factory builder for a given class and amount.
     *
     * @param  string  $class
     * @param  int  $amount
     * @return \Illuminate\Database\Eloquent\FactoryBuilder
     */
    function factory()
    {
        $factory = app(Factory::class);

        $arguments = func_get_args();

        if (isset($arguments[1]) && is_string($arguments[1])) {
            return $factory->of($arguments[0], $arguments[1])->times($arguments[2] ?? null);
        } elseif (isset($arguments[1])) {
            return $factory->of($arguments[0])->times($arguments[1]);
        }

        return $factory->of($arguments[0]);
    }
}
