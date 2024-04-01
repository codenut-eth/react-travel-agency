import React, {useState} from "react";
import { Link, useForm, } from '@inertiajs/react';
import logo from "../../../../public/assets/svg/logo-fui-gostei-trips-black.svg";
const Login = ({ canResetPassword, status }) => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [remember, setRemember] = useState(false);
    const { post } = useForm();

    const submit = (event) => {
        event.preventDefault();

        post(route('login'), {
            data: {
                email: email,
                password: password,
                remember: remember ? 'on' : '',
            },
            onFinish: () => setPassword(''),
        });
    };

    return (
        <section className="sec-hero-login">
            <div className="fundo-hero"></div>
            <div className="container-login">
                <div className="login">
                    <div className="logo">
                        <img src={logo} alt={'Logo'}/>
                    </div>
                    <h3>Bem-vindo viajante, pronto para embarcar?</h3>
                    <p>Por favor, insira sua credencial e senha.</p>
                    <form onSubmit={submit} id="formLogin">
                        <div className="single-input">
                            <span className="ico">
                                <svg width="18" height="20" viewBox="0 0 18 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.05857 8.18176C10.1659 8.18176 10.7195 8.18176 11.203 7.88284C11.3852 7.77016 11.6167 7.55952 11.746 7.38866C12.089 6.93543 12.13 6.49983 12.2122 5.62864C12.2633 5.08697 12.2624 4.56015 12.2085 4.00698C12.122 3.11794 12.0787 2.67342 11.7356 2.22184C11.6052 2.05024 11.3764 1.84262 11.1929 1.7295C10.7102 1.43178 10.153 1.43178 9.03845 1.43178L8.73395 1.43178C7.57796 1.43178 6.99997 1.43178 6.51092 1.74039C6.32299 1.85898 6.09662 2.07012 5.96524 2.24933C5.62334 2.71572 5.59036 3.18852 5.5244 4.13411C5.49229 4.59446 5.49179 5.03849 5.52214 5.49051C5.58494 6.42602 5.61635 6.89377 5.95811 7.36158C6.08883 7.54052 6.31676 7.75366 6.50406 7.8721C6.9937 8.18176 7.57039 8.18176 8.72378 8.18176L9.05857 8.18176Z" stroke="#AFAFAF" stroke-width="1.5" />
                                    <path d="M16.1873 18.8692L16.3327 17.3178C16.4791 15.7567 16.5522 14.9762 15.9966 13.9227C15.8196 13.5871 15.3243 12.9725 15.0341 12.7283C14.1227 11.9613 13.5632 11.8935 12.4441 11.7577C11.4492 11.6369 10.2651 11.5568 8.87485 11.5568C7.48461 11.5568 6.30054 11.6369 5.30565 11.7577C4.18652 11.8935 3.62695 11.9613 2.71563 12.7283C2.42537 12.9725 1.93011 13.5871 1.75313 13.9227C1.19747 14.9762 1.27064 15.7567 1.41699 17.3178L1.56244 18.8692" stroke="#AFAFAF" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </span>
                            <input type="text" name="user" placeholder="E-mail" required onChange={(e) => setEmail(e.target.value)} value={email}/>
                        </div>
                        <div className="single-input">
                            <span className="ico">
                                <svg width="13" height="21" viewBox="0 0 13 21" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 13.4318C1 12.4999 1 12.0339 1.15224 11.6664C1.35523 11.1763 1.74458 10.787 2.23464 10.584C2.60218 10.4318 3.06812 10.4318 3.99999 10.4318H9.24988C10.1818 10.4318 10.6477 10.4318 11.0152 10.584C11.5053 10.787 11.8946 11.1763 12.0976 11.6664C12.2499 12.0339 12.2499 12.4999 12.2499 13.4318V13.8068C12.2499 15.3191 12.2499 16.0753 12.048 16.6864C11.6507 17.8891 10.7072 18.8326 9.50454 19.2299C8.89345 19.4317 8.13727 19.4317 6.62493 19.4317V19.4317C5.11259 19.4317 4.35642 19.4317 3.74532 19.2299C2.54263 18.8326 1.59917 17.8891 1.20187 16.6864C1 16.0753 1 15.3191 1 13.8068V13.4318Z" stroke="#AFAFAF" stroke-width="1.5" />
                                    <path d="M7.75 16.0568H6.62501H5.50003" stroke="#AFAFAF" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M9.99992 10.4317V4.43176C9.99992 2.77491 8.65678 1.43176 6.99992 1.43176H6.25C4.59315 1.43176 3.25 2.77491 3.25 4.43176V10.4317" stroke="#AFAFAF" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </span>
                            <input type="password" name="senha" placeholder="Senha" required onChange={(e) => setPassword(e.target.value)} value={password}/>
                        </div>
                        <div className="submit-btn">
                            <button className="button" type="submit">
                                <span className="ico">
                                    <svg width="8" height="13" viewBox="0 0 8 13" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.30005 11.8317L6.70005 6.43174L1.30005 1.03174" stroke="white" stroke-width="1.5" stroke-miterlimit="3.3333" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    );
}

export default Login;