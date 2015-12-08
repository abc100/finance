<?php

namespace Fin\FinanceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Fin\FinanceBundle\Entity\Expense;
use Fin\FinanceBundle\Form\ExpenseType;

/**
 * Expense controller.
 *
 */
class ExpenseController extends Controller
{

    /**
     * Lists all Expense entities.
     *
     */
    public function indexAction(Request $request)
    {
//        $entities = $em->getRepository('FinFinanceBundle:Expense')->findAll();
        
        $page = $request->request->get('page', 1);        
        $per_page = $this->container->getParameter('max_items_on_page');
        
        $em = $this->getDoctrine()->getManager();
        $total_count = $em->getRepository('FinFinanceBundle:Expense')->getExpenses($page, $per_page, true);
        $last_page = ceil($total_count / $per_page);
        $previous_page = $page > 1 ? $page - 1 : 1;
        $next_page = $page < $last_page ? $page + 1 : $last_page;
        
        $result = $em->getRepository('FinFinanceBundle:Expense')->getExpenses($page, $per_page);
        
        if ($request->isXmlHttpRequest()) {
            return $this->render('FinFinanceBundle:Expense:table.html.twig', array(
              'entities' => $result['items'],
              'last_page' => $last_page,
              'previous_page' => $previous_page,
              'current_page' => $page,
              'next_page' => $next_page,
              'total_count' => $total_count
            ));            
        }
        
        return $this->render('FinFinanceBundle:Expense:index.html.twig', array(
          'entities' => $result['items'],
          'last_page' => $last_page,
          'previous_page' => $previous_page,
          'current_page' => $page,
          'next_page' => $next_page,
          'total_count' => $total_count
        ));
    }
    /**
     * Creates a new Expense entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Expense();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fin_expense_show', array('id' => $entity->getId())));
        }

        return $this->render('FinFinanceBundle:Expense:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Expense entity.
     *
     * @param Expense $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Expense $entity)
    {
        $form = $this->createForm(new ExpenseType(), $entity, array(
            'action' => $this->generateUrl('fin_expense_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Expense entity.
     *
     */
    public function newAction()
    {
        $entity = new Expense();
        $form   = $this->createCreateForm($entity);

        return $this->render('FinFinanceBundle:Expense:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Expense entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FinFinanceBundle:Expense')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Expense entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FinFinanceBundle:Expense:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Expense entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FinFinanceBundle:Expense')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Expense entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FinFinanceBundle:Expense:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Expense entity.
    *
    * @param Expense $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Expense $entity)
    {
        $form = $this->createForm(new ExpenseType(), $entity, array(
            'action' => $this->generateUrl('fin_expense_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Expense entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FinFinanceBundle:Expense')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Expense entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fin_expense_edit', array('id' => $id)));
        }

        return $this->render('FinFinanceBundle:Expense:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Expense entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FinFinanceBundle:Expense')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Expense entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fin_expense'));
    }

    /**
     * Creates a form to delete a Expense entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fin_expense_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
