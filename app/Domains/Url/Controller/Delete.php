<?php declare(strict_types=1);

namespace App\Domains\Url\Controller;

use Illuminate\Http\RedirectResponse;

class Delete extends ControllerAbstract
{
    /**
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(int $id): RedirectResponse
    {
        $this->row($id);

        if ($response = $this->actionPost('delete')) {
            return $response;
        }

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function delete(): RedirectResponse
    {
        $this->action()->delete();

        $this->sessionMessage('success', __('domain-url-delete.success'));

        if ($this->request->input('redirect')) {
            return redirect()->away($this->request->input('redirect'));
        }

        return redirect()->route('url.index');
    }
}
