import React from 'react';
import logout from "../../../../public/assets/svg/ico-logout.svg";
const Header = () => {
    return (
        <header className="sec-header">

            <div className="wrap-search">
                <form action="" role="search" className="search-form">
                    <input type="search" name="search" className="search-text" placeholder="Pesquisar..." autoComplete="off" />
                    <input type="submit" value="" className="search-submit" />
                </form>
            </div>

            <div className="wrap-notification">
                <button className="open-target button-search" data-target="notification">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.9" d="M10 17H9H8" stroke="#AFAFAF" strokeWidth="1.5" strokeLinecap="round" />
                        <path d="M5 6.38161V4.6718C5 3.25597 5.83142 1.97212 7.12338 1.39297C7.70126 1.13392 8.32738 1 8.96066 1H9.03934C9.67262 1 10.2987 1.13392 10.8766 1.39297C12.1686 1.97212 13 3.25597 13 4.6718V6.38161C13 7.44715 13.2374 8.4993 13.6949 9.46162L14.578 11.3193C14.8428 11.8762 14.8216 12.5267 14.5213 13.0653C14.1995 13.6423 13.5905 14 12.9297 14H5.07028C4.40953 14 3.80053 13.6423 3.4787 13.0653C3.17837 12.5267 3.15724 11.8762 3.42198 11.3193L4.30513 9.46162C4.76263 8.4993 5 7.44715 5 6.38161Z" stroke="#AFAFAF" strokeWidth="1.5" />
                    </svg>
                </button>
                <div className="notification" id="notification">
                    <ul>
                        <li>Notificação 1</li>
                        <li>Notificação 2</li>
                        <li>Notificação 3</li>
                    </ul>
                </div>
            </div>
            <div className="wrap-user">
                <button className="button-user open-target" data-target="submenu-account">
                    <div className="name">
                        Roberta Campos
                    </div>
                    {/* Foto do perfil colocar a imagem no style background */}
                    <div className="thumb" style={{ background: '#CCC' }}>

                    </div>
                </button>
                <div className="submenu-account">
                    <ul>
                        <li>
                            <a href="" className="btn-logout">
                                <span className="ico">
                                    <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.05857 8.18176C10.1659 8.18176 10.7195 8.18176 11.203 7.88284C11.3852 7.77016 11.6167 7.55952 11.746 7.38866C12.089 6.93543 12.13 6.49983 12.2122 5.62864C12.2633 5.08697 12.2624 4.56015 12.2085 4.00698C12.122 3.11794 12.0787 2.67342 11.7356 2.22184C11.6052 2.05024 11.3764 1.84262 11.1929 1.7295C10.7102 1.43178 10.153 1.43178 9.03845 1.43178L8.73395 1.43178C7.57796 1.43178 6.99997 1.43178 6.51092 1.74039C6.32299 1.85898 6.09662 2.07012 5.96524 2.24933C5.62334 2.71572 5.59036 3.18852 5.5244 4.13411C5.49229 4.59446 5.49179 5.03849 5.52214 5.49051C5.58494 6.42602 5.61635 6.89377 5.95811 7.36158C6.08883 7.54052 6.31676 7.75366 6.50406 7.8721C6.9937 8.18176 7.57039 8.18176 8.72378 8.18176L9.05857 8.18176Z" stroke="#333" strokeWidth="1.5" />
                                        <path d="M16.1873 18.8692L16.3327 17.3178C16.4791 15.7567 16.5522 14.9762 15.9966 13.9227C15.8196 13.5871 15.3243 12.9725 15.0341 12.7283C14.1227 11.9613 13.5632 11.8935 12.4441 11.7577C11.4492 11.6369 10.2651 11.5568 8.87485 11.5568C7.48461 11.5568 6.30054 11.6369 5.30565 11.7577C4.18652 11.8935 3.62695 11.9613 2.71563 12.7283C2.42537 12.9725 1.93011 13.5871 1.75313 13.9227C1.19747 14.9762 1.27064 15.7567 1.41699 17.3178L1.56244 18.8692" stroke="#333" strokeWidth="1.5" strokeLinecap="round" />
                                    </svg>
                                </span>
                                <span className="txt">
                                    Minha conta
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="" className="btn-logout">
                                <span className="ico">
                                    <img src={logout} alt="" />
                                </span>
                                <span className="txt">
                                    Logout
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    );
}

export default Header;
