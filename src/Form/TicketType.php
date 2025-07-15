<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\enum\priority;
use App\enum\status;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('priority', ChoiceType::class, [
                'choices' => priority::cases(),
                'choice_label' => fn(priority $p) => $p->name,
                'choice_value' => fn(?priority $p) => $p?->value,
            ])
            ->add('status', ChoiceType::class, [
                'choices' => status::cases(),
                'choice_label' => fn(status $s) => $s->name,
                'choice_value' => fn(?status $s) => $s?->value,
            ])
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
