<?
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CajaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('altura', 'integer', array( 'label'  => 'Altura' ))
            ->add('longitud', 'integer', array( 'label'  => 'Longitud' ))
            ->add('profundidad', 'integer', array( 'label'  => 'Profundidad' ))
            ->add('categoria', 'entity', array(
                'class' => 'AppBundle:Categoria',
                'property' => 'nombre',

            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Caja'
        ));
    }

    public function getName()
    {
        return 'caja';
    }
}