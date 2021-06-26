<?php declare(strict_types=1);

namespace App\Domains\Domain\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UpdateUrlCreate extends ControllerAbstract
{
    /**
     * @param int $id
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(int $id): Response|RedirectResponse
    {
        $this->row($id);

        if ($response = $this->actionPost('create')) {
            return $response;
        }

        $this->meta('title', $this->row->host);

        return $this->page('domain.update-url-create', [
            'row' => $this->row,
            'subdomains' => $this->row->subdomains()->list()->get(),
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function create(): RedirectResponse
    {
        $this->url = $this->factory('Url')->action()->create();

        $this->sessionMessage('success', __('domain-update-url-create.success'));

        return redirect()->route('domain.update.url.update', [$this->row->id, $this->url->id]);
    }
}
