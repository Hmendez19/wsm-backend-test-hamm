<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\AccountServices;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ODM\MongoDB\DocumentManager;

class ReportsController extends AbstractController
{
    private $template = "reports.html.twig";

    public function __construct(DocumentManager $dm)
    {
        $this->accountService = new AccountServices($dm);
    }

    /**
     * @Route("/", name="reports")
     */
    public function index(Request $request)
    {
        $this->accountService->setParameters($request);
        $data = $this->accountService->getStaticData();
        $data['data'] = $this->accountService->getData();
        $data['account_id'] = (empty($this->accountService->getParameters()['show_all'])) ? $this->accountService->getParameters()['account_id'] : "";
        return $this->render($this->template, $data);
    }
}
