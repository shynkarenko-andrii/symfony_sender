<?php

// src/Form/ChannelsSettingsForm.php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChannelsSettingsForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', CheckboxType::class, [
                'label' => 'Email',
                'required' => false,
            ])
            ->add('sms', CheckboxType::class, [
                'label' => 'SMS',
                'required' => false,
            ])
            ->add('webPush', CheckboxType::class, [
                'label' => 'WebPush',
                'required' => false,
            ])
            ->add('telegram', CheckboxType::class, [
                'label' => 'Telegram',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Укажите сущность (Entity) для связи с формой
            // Например: 'data_class' => 'App\Entity\UserChannelsSettings',
        ]);
    }
}
