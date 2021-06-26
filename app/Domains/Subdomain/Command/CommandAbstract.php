<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Command;

use App\Domains\Shared\Command\CommandAbstract as CommandAbstractShared;
use App\Domains\Subdomain\Model\Subdomain as Model;

abstract class CommandAbstract extends CommandAbstractShared
{
    /**
     * @var \App\Domains\Subdomain\Model\Subdomain
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
