const recipients = document.querySelector("#recipients");
const smtp = document.querySelector("#smtp");
const handleOptionSwitch = (input,value,list)=>{
  list.forEach(item => !document.querySelector(`#${input+"-"+item+"-input"}`).classList.contains("d-none") && document.querySelector(`#${input+"-"+item+"-input"}`).classList.add('d-none'));
  document.querySelector(`#${input+"-"+value+"-input"}`).classList.contains("d-none") && document.querySelector(`#${input+"-"+value+"-input"}`).classList.remove('d-none');
}

const handleRecipientChange = ({ target })=>{
  const value = target.value;
  const list = ['email','mailfile','combofile','combotext','mailtext'];
  handleOptionSwitch('recipients',value,list);
  
}
const handleSMTPInputChange = ({ target })=>{
  const value = target.value;
  const list = ['file','textarea','configuration'];
  handleOptionSwitch('smtp',value,list);
  
}

recipients.addEventListener('change',handleRecipientChange);
smtp.addEventListener('change',handleSMTPInputChange);


document.onload = ()=>{
  handleRecipientChange(recipients);
  handleSMTPInputChange(smtp);
}