<?php declare(strict_types=1);

namespace App\Domains\Domain\Controller;

use Illuminate\Http\Response;

class UpdateSubdomain extends ControllerAbstract
{
    /**
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(int $id): Response
    {
        $this->row($id);

        $this->meta('title', $this->row->host);

        return $this->page('domain.update-subdomain', [
            'row' => $this->row,
            'subdomains' => $this->row->subdomains()->list()->get(),
        ]);
    }
}
