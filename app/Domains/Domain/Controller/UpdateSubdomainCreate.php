<?php declare(strict_types=1);

namespace App\Domains\Domain\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UpdateSubdomainCreate extends ControllerAbstract
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

        return $this->page('domain.update-subdomain-create', [
            'row' => $this->row,
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function create(): RedirectResponse
    {
        $this->subdomain = $this->factory('Subdomain')->action()->create();

        $this->sessionMessage('success', __('domain-update-subdomain-create.success'));

        return redirect()->route('domain.update.subdomain.update', [$this->row->id, $this->subdomain->id]);
    }
}
