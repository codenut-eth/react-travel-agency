import React, { useEffect } from 'react';
import { Inertia } from '@inertiajs/inertia';

const Authenticated = ({ user }) => {
    useEffect(() => {
        // Aqui você pode colocar lógica para verificar o tipo de usuário e redirecioná-lo para a página correta
        switch (user.type) {
            case 'admin':
                Inertia.redirect('/admin-home');
                break;
            case 'normal':
                Inertia.redirect('/normal-home');
                break;
            default:
                Inertia.redirect('/');
                break;
        }
    }, [user]);

    return <div>Carregando...</div>;
}

export default Authenticated;
