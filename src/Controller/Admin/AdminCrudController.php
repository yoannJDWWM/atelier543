<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AdminCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }

//     public function configureFields(string $pageName): iterable
// {
//     return [
//         TextField::new('username')->setLabel('Nom d\'utilisateur'),
//         TextEditorField::new('password')->onlyOnForms(), // Utilisez TextEditorField à la place de PasswordField
//       ];
// }
}
