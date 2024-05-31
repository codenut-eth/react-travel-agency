import React, { useState } from "react";
import { Link, useForm } from '@inertiajs/react';
import logo from "../../../../public/assets/svg/logo-fui-gostei-trips-black.svg";

const Register = (laravelVersion) => {

    const {data, setData, post, processing, errors } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        terms: ''
    });
const onHandleInputChange = (event) => {
    setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
}
    const submit = (e) => {
        e.preventDefault();
        post(route('register'), {data});
    };


    return (
        <section className="sec-hero-login">
            <div className="fundo-hero"></div>
            <div className="container-login">
                <div className="login">
                    <div className="logo">
                        <img src={logo} alt={'Logo'} />
                    </div>
                    <h3>Crie sua conta para embarcar</h3>
                    <p>Preencha os dados para começar sua jornada.</p>
                    <form onSubmit={submit} id="formRegister">
                        <div className="single-input">
                            <input type="text" id={"name"} name="name" placeholder="Nome" value={data.name} onChange={onHandleInputChange}  />
                        </div>
                        <div className="single-input">
                            <input type="email" name="email" placeholder="E-mail" value={data.email} onChange={onHandleInputChange}  />
                        </div>
                        <div className="single-input">
                            <input type="password" name="password" placeholder="Senha" value={data.password} onChange={onHandleInputChange}  />
                        </div>
                        <div className="single-input">
                            {/* ... (Input para confirmação de senha) */}
                            <input type="password" name="password_confirmation" placeholder="Confirme a Senha" value={data.password_confirmation} onChange={onHandleInputChange} />
                        </div>

                        {laravelVersion?.hasTermsAndPrivacyPolicyFeature && (
                            <div className="checkbox-container">
                                <label htmlFor="terms">
                                    <input
                                        id="terms"
                                        type="checkbox"
                                        name="terms"
                                        checked={data.terms}
                                        onChange={onHandleInputChange}
                                    />
                                    Li e concordo com os termos e condições
                                </label>
                            </div>
                        )}

                        {Object.keys(errors).length > 0 && (
                            <div className="errors">
                                {Object.values(errors).map((error, index) => (
                                    <p key={index}>{error}</p>
                                ))}
                            </div>
                        )}

                        <div className="submit-btn">
                            {/* ... (Botão de registro) */}
                            <button className="button" type="submit" disabled={processing}>
                                {processing ? 'Cadastrando...' : 'Cadastrar'}
                            </button>
                        </div>

                        {/* Link para o Login */}
                        <p>
                            Já tem uma conta? <Link href={route('login')}>Faça login</Link>
                        </p>
                    </form>
                </div>
            </div>
        </section>
    );

};
export default Register;
