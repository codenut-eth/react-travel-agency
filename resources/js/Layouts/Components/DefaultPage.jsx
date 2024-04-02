import React from 'react';
import Header from './Header';
import Aside from './Aside';
// import "../../../css/style.css";
const DefaultPage = ({ children }) => {
    return (
        <div>
            <section className="main-page sec-home">
                <div className="grid">
            <Header />
            <Aside />
            <main>
                {children}
            </main>
                </div>
            </section>
        </div>
    );
}

export default DefaultPage;
