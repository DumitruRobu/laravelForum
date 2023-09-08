<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class UtilizatoriFilter extends AbstractFilter
{
    const NUME = 'nume';
    const GEN = 'gen';
    const IMPUTERNICIRI_ID = 'imputerniciri_id';

    protected function getCallbacks(): array
    {
        return [
            self::NUME =>[$this, 'nume'],
            self::GEN =>[$this, 'gen'],
            self::IMPUTERNICIRI_ID =>[$this, 'imputerniciri_id'],

        ];

    }

    public function nume(Builder $builder, $value)
    {
        $builder->where('nume', 'like', "%{$value}%");
    }

    public function gen(Builder $builder, $value)
    {
        $builder->where('gen', 'like', "%{$value}%");
    }

    public function imputerniciri_id(Builder $builder, $value)
    {
        $builder->where('imputerniciri_id', $value);
    }
}
