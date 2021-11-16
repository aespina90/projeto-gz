import React from "react";

const Review = ({ setForm, formData, navigation }) => {
  const {
    firstName,
    email,
    telefone,
    cnpj,
    nomeFantasia,
    razaoSocial,
    logradouro,
    numero,
    bairro,
    cidade,
    state,
    cep
  } = formData;
  const { go } = navigation;

  return (
    <div className="login-form">
      <h3>Confirme os Dados</h3>
      <h4>
        Dados do Contato&nbsp;&nbsp;
        <button onClick={() => go("firstStep")}>Editar</button>
      </h4>
      <div>
        {" "}
        Nome: {`${firstName}`},
        <br />
        E-mail: {`${email}`},
      </div>
      <div>Telefone: {`${telefone}`}</div>
      <h4>
        Dados da Empresa&nbsp;&nbsp;
        <button onClick={() => go("secondStep")}>Editar</button>
      </h4>
      <div>
        CNPJ/CPF: {`${cnpj}`},
        <br />
        Nome Fantasia: {` ${nomeFantasia}`},
        <br />
        Razão Social: {`${razaoSocial}`},
      </div>
      <h4>
        Endereço&nbsp;&nbsp;
        <button onClick={() => go("thirdStep")}>Editar</button>
      </h4>
      <div>
        Logradouro: {`${logradouro}`},
        <br />
        Nº: {`${numero}`},
        <br />
        Bairro: {`${bairro}`},
        <br />
        Cidade: {`${cidade}`},
        <br />
        Estado: {`${state}`},
        <br />
        CEP: {`${cep}`}
      </div>
      <div>
        <button onClick={() => go("submit")}>Criar Retaguarda</button>
      </div>
    </div>
  );
};

export default Review;
