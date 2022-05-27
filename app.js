import { CallClient, CallAgent } from "@azure/communication-calling";
import { AzureCommunicationTokenCredential } from '@azure/communication-common';

let call;
let callAgent;

const calleePhoneInput = document.getElementById("callee-phone-input");
const callPhoneButton = document.getElementById("call-phone-button");
const hangUpPhoneButton = document.getElementById("hang-up-phone-button");

async function init() {
    const callClient = new CallClient();
    const tokenCredential = new AzureCommunicationTokenCredential('<USER ACCESS TOKEN with VoIP scope>');
    callAgent = await callClient.createCallAgent(tokenCredential);
    //callPhoneButton.disabled = false;
}

init();

// Demarrer un appel

callPhoneButton.addEventListener("click", () => {
    // start a call to phone
    const phoneToCall = calleePhoneInput.value;
    call = callAgent.startCall(
      [{phoneNumber: phoneToCall}], { alternateCallerId: {phoneNumber: 'YOUR AZURE REGISTERED PHONE NUMBER HERE: +12223334444'}
    });
    // toggle button states
    hangUpPhoneButton.disabled = false;
    callPhoneButton.disabled = true;
  });

// Mettre fin à un appel 

hangUpPhoneButton.addEventListener("click", () => {
    // end the current call
    call.hangUp({
      forEveryone: true
    });
  
    // toggle button states
    hangUpPhoneButton.disabled = true;
    callPhoneButton.disabled = false;
  });