<?php
namespace Portal\Form;

use Zend\Form\Form;
use Doctrine\ORM\EntityManager;

class Funcionario extends Form
{	

	public function __construct(EntityManager $em)
	{		
		parent::__construct('funcionario');
		$this->setAttribute('method', 'post');
		$this->setAttribute('action', 'portal/funcionario/save');

		$this->add(array(
			'name' => 'id',
			'attributes' => array(
				'type' => 'hidden'
			),			
		));

		$this->add(array(
			'name' => 'refCodPessoaFj',
			'attributes' => array(
				'type' => 'DoctrineModule\Form\Element\ObjectSelect',
			),
			'type' => 'DoctrineModule\Form\Element\ObjectSelect',
			'options' => array(
				'label' => 'Pessoa Física',
				'empty_option' => 'Selecione',
				'object_manager' => $em,
				'target_class' => 'Usuario\Entity\Fisica',
				'property' => 'nome',
			),
		));


		$this->add(array(
			'name' => 'matricula',
			'attributes' => array(
				'type' => 'text'
			),
			'options' => array(
				'label' => 'Matrícula'
			),
		));

		$this->add(array(
			'name' => 'senha',
			'attributes' => array(
				'type' => 'password'
			),
			'options' => array(
				'label' => 'Senha'
			),
		));

		$this->add(array(
			'name' => 'ativo',
			'attributes' => array(
				'type' => 'Zend\Form\Element\Select'
			),
			'type' => 'Zend\Form\Element\Select',
			'options' => array(
				'label' => 'Situação',
				'value_options' => array(
					true => 'Ativo',
					false => 'Inativo',					
				),
			),
			'attributes' => array(
				'value' => true
			),
		));

		$this->add(array(
			'name' => 'refCodFuncionarioVinculo',
			'attributes' => array(
				'type' => 'Zend\Form\Element\Select'
			),
			'type' => 'Zend\Form\Element\Select',
			'options' => array(
				'label' => 'Vínculo',
				'value_options' => array(
					'' => 'Selecione',
					5 => 'Comissionado',
					4 => 'Contratado',
					3 => 'Efetivo',
					6 => 'Estágiario'
				),
			),
			'attributes' => array(
				'value' => ''
			),
		));

		$this->add(array(
			'name' => 'tempoExpiraConta',
			'attributes' => array(
				'type' => 'Zend\Form\Element\Select'
			),
			'type' => 'Zend\Form\Element\Select',
			'options' => array(
				'label' => 'Dias p/ expirar a conta',
				'value_options' => array(
					'' => 'Selecione',
					5 => '5',					
					10 => '10',
					15 => '15',
					20 => '20',
					25 => '25',
					30 => '30',
					35 => '35',
					40 => '40',
					60 => '60',
					90 => '90',
					120 => '120',
					150 => '150',
					180 => '180',
					210 => '210',
					240 => '240',
					270 => '270',
					300 => '300',
					365 => '365'
				),
			),
			'attributes' => array(
				'value' => ''
			),
		));

		$this->add(array(
			'name' => 'proibido',
			'attributes' => array(
				'type' => 'Zend\Form\Element\Checkbox'
			),
			'type' => 'Zend\Form\Element\Checkbox',
			'options' => array(
				'label' => 'Banido',
				'checked_value' => '1',
        		'unchecked_value' => '0'
			),			
		));

		$this->add(array(
			'name' => 'matriculaPermanente',
			'attributes' => array(
				'type' => 'Zend\Form\Element\Checkbox'
			),
			'type' => 'Zend\Form\Element\Checkbox',
			'options' => array(
				'label' => 'Matrícula Permanente',
				'checked_value' => '1',
        		'unchecked_value' => '0'
			),			
		));		

		$this->add(array(
			'name' => 'refCodSetorNew',
			'attributes' => array(
				'type' => 'DoctrineModule\Form\Element\ObjectSelect',
			),
			'type' => 'DoctrineModule\Form\Element\ObjectSelect',
			'options' => array(
				'label' => 'Setor',
				'empty_option' => 'Selecione',
				'object_manager' => $em,
				'target_class' => 'Drh\Entity\Setor',
				'property' => 'nome',
			),
		));

		$this->add(array(
			'name' => 'submit',
			'attributes' => array(
				'type' => 'submit',
				'value' => 'Enviar',
				'id' => 'submitbutton',
			),			
		));

	}
}