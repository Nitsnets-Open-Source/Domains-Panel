<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

use App\Domains\Shared\Command\CommandAbstract as CommandAbstractShared;
use App\Domains\Domain\Model\Domain as Model;

abstract class CommandAbstract extends CommandAbstractShared
{
    /**
     * @var \App\Domains\Domain\Model\Domain
     */
    protected Model $row;

    /**
     * @return void
     */
    protected function row(): void
    {
        $this->row = Model::findOrFail($this->checkOption('id'));
        $this->actingAs($this->row->user);
    }
}
