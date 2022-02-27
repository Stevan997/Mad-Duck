<?php

use App\Models\Store;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class StoreService
{
    private $store;

    public function set(string $name)
    {
        $this->store = Store::where('name', $name)->first();
    }

    public function get()
    {
        return $this->store;
    }

    public function reports(Request $request)
    {
        try {
            $from = $request->get('from_date');
            $to = $request->get('to_date');
            $store = $request->get('store');
        } catch (Exception $exception) {
            return ['message' => $exception->getMessage(), 'status' => 'error'];
        }

        return Store::query()->where('name', $store)->with(['bills' => function (Builder $query) use ($from, $to) {
            $query->whereBetween('created_at', [$from, $to]);
        }])->get();
    }
}
