import React from "react";
import { useForm, useStep } from "react-hooks-helper";

import FirstStep from "./FirstStep";
import SecondStep from "./SecondStep";
import ThirdStep from "./ThirdStep";
import Review from "./Review";
import Submit from "./Submit";

import "./styles.css";

const steps = [
  { id: "firstStep" },
  { id: "secondStep" },
  { id: "thirdStep" },
  { id: "review" },
  { id: "submit" }
];

const defaultData = {
  firstName: "",
  email: "",
  telefone: "",
  senha: "",
  cnpj: "",
  nomeFantasia: "",
  razaoSocial: "",
  logradouro: "",
  numero: "",
  bairro: "",
  cidade: "",
  cep: ""
};

const MultiStepForm = ({ images }) => {
  const [formData, setForm] = useForm(defaultData);
  const { step, navigation } = useStep({ initialStep: 0, steps });
  const { id } = step;

  const props = { formData, setForm, navigation };

  switch (id) {
    case "firstStep":
      return <FirstStep {...props} />;
    case "secondStep":
      return <SecondStep {...props} />;
    case "thirdStep":
      return <ThirdStep {...props} />;
    case "review":
      return <Review {...props} />;
    case "submit":
      return <Submit {...props} />;
    default:
      return null;
  }
};

export default MultiStepForm;
