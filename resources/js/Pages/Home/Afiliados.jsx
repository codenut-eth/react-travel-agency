import React, {useEffect} from 'react';
import DefaultPage from '../../Layouts/Components/DefaultPage';
import notPagDeAfiliados from '../../../../public/assets/images/not-pag-de-afiliados.png';
const AfiliadosHomePage = () => {
    return (
        <DefaultPage>
            <div className="page-layout afiliados">
                <div className="container-dashboard">
                    <div className="item ganhos-por-reserva">
                        <div className="wrapper-ganhos-por-reserva">
                            <div className="txt">
                                <p>Ganhos por reserva</p>
                            </div>
                            <div className="input">
                                <select name="" id="" className="textfield">
                                    <option value=""></option>
                                    <option value="">02/2020</option>
                                </select>
                            </div>
                        </div>
                        <div className="result-ganhos-por-reserva">
                            <h3>R$ 2.595,15</h3>
                            <p className="obs">Atualização mensal (Décimo quinto dia)</p>
                            <a href="" className="button">Clique para ver detalhes</a>
                        </div>
                    </div>
                    <a href="" className="item pagina-afiliado">
                        <p>Página de Afiliado</p>
                        <img src={notPagDeAfiliados} className="img-detail" alt="" />
                    </a>
                    <a href="" className="item arquivos">
                        <p>Arquivos e materiais para divulgação</p>
                    </a>
                </div>

                <div className="grafico">
                    {/* Conteúdo do gráfico */}
                    {/* Coloque aqui a lógica para renderizar o gráfico */}
                </div>

                <div className="container-table">
                    {/* Conteúdo da tabela */}
                    {/* Coloque aqui a lógica para renderizar a tabela */}
                </div>
            </div>
        </DefaultPage>
    );
}

export default AfiliadosHomePage;
