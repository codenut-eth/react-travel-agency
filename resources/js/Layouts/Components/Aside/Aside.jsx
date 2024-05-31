import React from 'react';
import whitelogo from '../../../../../public/assets/svg/logo-white.svg';
import iconInicio from '../../../../../public/assets/svg/ico-inicio.svg';
import iconCadastro from '../../../../../public/assets/svg/ico-cadastro.svg';
import iconConsulta from '../../../../../public/assets/svg/ico-consulta.svg';
import iconFuncionalidades from '../../../../../public/assets/svg/ico-funcionalidades.svg';
import iconCalculadora from '../../../../../public/assets/svg/ico-calculadora.svg';
import iconOrcamento from '../../../../../public/assets/svg/ico-orcamento.svg';
import {Link} from "@inertiajs/react";

const Aside = () => {
    return (
        <aside className="main-page-aside">
            <div>
                <div className="logo">
                    <img src={whitelogo} alt="Logo"/>
                </div>

                <nav className="sec-menu">
                    <ul>
                        <li>
                            <Link href={route('dashboard')} className="active">
                                <span className="ico">
                                    <img src={iconInicio} alt="Ícone Início"/>
                                </span>
                                <span className="txt">
                                    Início
                                </span>
                            </Link>
                        </li>

                        <li>
                            <Link href={route('affiliates')} className="active">
                                <span className="ico">
                                    <img src={iconCadastro} alt="Ícone Cadastro"/>
                                </span>
                                <span className="txt">
                                    Cadastro
                                </span>
                            </Link>
                        </li>

                        <li>
                            <a href="#">
                                <span className="ico">
                                    <img src={iconCadastro} alt="Ícone Devoluções"/>
                                </span>
                                <span className="txt">
                                    Devoluções
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span className="ico">
                                    <img src={iconConsulta} alt="Ícone Consulta"/>
                                </span>
                                <span className="txt">
                                    Consulta
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span className="ico">
                                    <img src={iconFuncionalidades} alt="Ícone Funcionalidades"/>
                                </span>
                                <span className="txt">
                                    Funcionalidades
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span className="ico">
                                    <img src={iconCalculadora} alt="Ícone Calculadora"/>
                                </span>
                                <span className="txt">
                                    Calculadora
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span className="ico">
                                    <img src={iconOrcamento} alt="Ícone Orçamento"/>
                                </span>
                                <span className="txt">
                                    Orçamento
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
    );
}

export default Aside;
