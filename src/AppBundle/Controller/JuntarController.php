<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 8/11/15
 * Time: 17:11
 */

namespace AppBundle\Controller;


use AppBundle\Services\JuntarService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class JuntarController extends Controller
{

    /**
     *@Route(
     *          path = "/juntar/",
     *          name = "app_default_juntar")
     */
    public function juntarAction()
    {
        return $this->render(':default:dojuntar.html.twig');
    }


    /**
     *@Route(
     *      path = "/dojuntar/",
     *      name = "app_default_dojuntar")
     */
    public function doSumAction(Request $request)
    {
        $cadena1 = $request->request->get('cadena1');
        $cadena2 = $request->request->get('cadena2');


        $j = $this->container->get('juntar');
        $j->setCadena1($cadena1);
        $j->setCadena2($cadena2);

        $j->juntar();

        $result = $j->getResult();


        return $this->render(':default:juntar.html.twig', array(  //render devolver una vista
                'result' => $result,

            )
        );
    }
}