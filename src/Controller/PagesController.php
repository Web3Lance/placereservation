<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    public $db;

    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel("Reservations");
        $this->db = ConnectionManager::get("default");
        
    }

    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function home()
    {
        $this->set("title", "Accueil");
        $this->viewBuilder()->setLayout('default');
    }
    public function new()
    {
        $reservation = $this->Reservations->newEmptyEntity();
        $reservation->status = 'new';
        if ($this->Reservations->save($reservation)) {
            $this->set(compact("reservation"));
        }
    }
    public function loadUsers()
    {
        if ($this->request->is("ajax")) {
            // Used when ajax loads data
            $params['draw'] = $_REQUEST['draw'];
            $start = $_REQUEST['start'];
            $length = $_REQUEST['length'];
            /* If we pass any extra data in request from ajax */
            //$value1 = isset($_REQUEST['key1'])?$_REQUEST['key1']:"";

            /* Value we will get from typing in search */
            $search_value = $_REQUEST['search']['value'];

            if (!empty($search_value)) {
                // If we have value in search, searching by id, name, email, mobile

                // count all data
                $total_count = $this->db->execute("SELECT * from users 
                    WHERE lastname like '%" . $search_value . "%' 
                    OR firstname like '%" . $search_value . "%' 
                    OR email like '%" . $search_value . "%' 
                    OR phone like '%" . $search_value . "%'"
                )->fetchAll('assoc');

                $data = $this->db->execute("SELECT * from users 
                    WHERE firstname like '%" . $search_value . "%' 
                    OR lastname like '%" . $search_value . "%' 
                    OR email like '%" . $search_value . "%' 
                    OR phone like '%" . $search_value . "%' limit $start, $length"
                )->fetchAll('assoc');

            } else {
                // count all data
                $total_count = $this->db->execute("SELECT * from users")->fetchAll('assoc');

                // get per page data
                $data = $this->db->execute("SELECT * from users limit $start, $length")->fetchAll('assoc');
            }

            $json_data = array(
                "draw" => intval($params['draw']),
                "recordsTotal" => count($total_count),
                "recordsFiltered" => count($total_count),
                "data" => $data   // total data array
            );

            echo json_encode($json_data);
            die;
        }
    }
}
