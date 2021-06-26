<?php declare(strict_types=1);

namespace App\Domains\Check\Action;

use Illuminate\Support\Collection;
use App\Domains\Check\Model\Check as Model;
use App\Domains\Shared\Action\ActionAbstract as ActionAbstractShared;

abstract class ActionAbstract extends ActionAbstractShared
{
    /**
     * @var ?\App\Domains\Check\Model\Check
     */
    protected ?Model $row;

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    protected function details(string $key, $value): void
    {
        $details = $this->row->details ?: [];
        $details[$key] = $value;

        $this->row->details = $details;
    }

    /**
     * @param string $status
     *
     * @return void
     */
    protected function status(string $status): void
    {
        $this->row->status = $status;

        if ($this->row->status === 'FAILED') {
            $this->notify();
        }
    }

    /**
     * @return void
     */
    protected function notify(): void
    {
        $limit = $this->notifyLimit();
        $list = $this->notifyList($limit);

        if (($list->count() < $limit) || (($list->count() % $limit) !== 0)) {
            return;
        }

        $this->notifyMail($list, $limit);
    }

    /**
     * @return int
     */
    protected function notifyLimit(): int
    {
        return (int)app('configuration')->get('check_notify_fails_'.$this->row->type);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    protected function notifyList(): Collection
    {
        return Model::byIdNot($this->row->id)
            ->bySame($this->row)
            ->whileStatus($this->row, 'FAILED')
            ->orderByLast()
            ->get();
    }

    /**
     * @param \Illuminate\Support\Collection $list
     * @param int $limit
     *
     * @return void
     */
    protected function notifyMail(Collection $list, int $limit): void
    {
        $this->factory()->mail()->failed($this->row, $list, $limit);
    }
}
