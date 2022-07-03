import{_ as u,a as g,o as d,c,b as e,n as p,t as _,d as m,w as a,v as i,p as h,e as f}from"./index.js";const b={data(){return{data:{first_name:null,last_name:null,email:null,password:null},message:"",messageType:"success"}},methods:{doSignup(){this.message="",g.post("/user/signup",this.data).then(n=>{console.log("user created",n.data),n.data.userId!=null?(this.message="User created successfully, you can login to your account now",this.messageType="success"):n.data.error!=null?(this.message=n.data.error,this.messageType="danger"):(this.message="Unknown error happened",this.messageType="danger")}).catch(n=>{this.message="an error occured",this.messageType="danger"})}},mounted(){}},t=n=>(h("data-v-edb1ce32"),n=n(),f(),n),v={class:"login-page"},x={class:"form-signin"},w={class:"form"},y={class:"icon",x:"0px",y:"0px",width:"513.255px",height:"513.255px",viewBox:"0 0 513.255 513.255",style:{"enable-background":"new 0 0 513.255 513.255"},"xml:space":"preserve"},C=t(()=>e("g",null,[e("path",{d:`M331.895,421.526V237.344l108.475-17.588c-17.277-91.572-97.64-160.85-194.234-160.85
		c-109.201,0-197.721,88.52-197.721,197.721c0,109.202,88.52,197.722,197.721,197.722c10.592,0,20.978-0.857,31.115-2.459
		c7.938-13.176,22.177-23.75,40.258-28.271C322.285,422.437,327.108,421.727,331.895,421.526z M282.463,75.043l-21.184,92.811
		h-21.185l-15.132-92.811C247.159,63.942,282.463,75.043,282.463,75.043z M246.136,330.033c-40.542,0-73.406-32.864-73.406-73.406
		c0-40.542,32.864-73.405,73.406-73.405c40.542,0,73.406,32.864,73.406,73.405C319.542,297.169,286.678,330.033,246.136,330.033z
		 M246.136,200.658c-30.869,0-55.969,25.1-55.969,55.969c0,30.866,25.1,55.97,55.969,55.97c30.867,0,55.969-25.104,55.969-55.97
		C302.105,225.758,277.002,200.658,246.136,200.658z M246.136,296.607c-22.044,0-39.977-17.933-39.977-39.98
		c0-22.044,17.939-39.977,39.977-39.977c22.047,0,39.968,17.933,39.968,39.977C286.104,278.675,268.183,296.607,246.136,296.607z
		 M271.458,486.001c0.958,5.308,3.062,10.249,6.1,14.688c-10.296,1.318-20.77,2.075-31.415,2.075
		C110.419,502.764,0,392.345,0,256.627C0,120.91,110.419,10.491,246.136,10.491c120.473,0,220.945,87.036,242.01,201.516
		l-23.896,3.88C445.057,112.913,354.586,34.702,246.136,34.702c-122.371,0-221.925,99.555-221.925,221.925
		c0,122.371,99.555,221.926,221.925,221.926c8.195,0,16.279-0.479,24.246-1.348C270.453,480.125,270.772,483.062,271.458,486.001z
		 M513.255,225.279v213.405c0,17.674-13.175,31.771-33.727,36.96c-22.562,5.592-44.343-3.854-48.67-21.148
		c-4.326-17.324,10.45-35.902,33.006-41.547c10.196-2.518,20.227-2.004,28.626,0.952V285.336L377.119,306.42l-0.532,159.944h-0.023
		c-0.101,15.15-13.761,30.016-33.408,34.88c-22.283,5.609-45.643-5.001-48.148-20.877c-4.285-17.129,10.32-35.518,32.663-41.115
		c10.054-2.5,19.878-1.997,28.135,0.893V250.817L513.255,225.279z`})],-1)),I=t(()=>e("g",null,null,-1)),V=t(()=>e("g",null,null,-1)),k=t(()=>e("g",null,null,-1)),z=t(()=>e("g",null,null,-1)),S=t(()=>e("g",null,null,-1)),M=t(()=>e("g",null,null,-1)),T=t(()=>e("g",null,null,-1)),N=t(()=>e("g",null,null,-1)),U=t(()=>e("g",null,null,-1)),B=t(()=>e("g",null,null,-1)),L=t(()=>e("g",null,null,-1)),P=t(()=>e("g",null,null,-1)),E=t(()=>e("g",null,null,-1)),D=t(()=>e("g",null,null,-1)),F=t(()=>e("g",null,null,-1)),J=[C,I,V,k,z,S,M,T,N,U,B,L,P,E,D,F],j=t(()=>e("h1",{class:"h3 mb-3 fw-normal"},"Join Us Now!",-1)),q={class:"form-floating"},A=t(()=>e("label",{for:"floatingInput"},"First Name",-1)),G={class:"form-floating"},H=t(()=>e("label",{for:"floatingInput"},"Last Name",-1)),K={class:"form-floating"},O=t(()=>e("label",{for:"floatingInput"},"Email address",-1)),Q={class:"form-floating"},R=t(()=>e("label",{for:"floatingPassword"},"Password",-1)),W=t(()=>e("br",null,null,-1));function X(n,o,Y,Z,s,r){return d(),c("div",v,[e("main",x,[e("div",w,[(d(),c("svg",y,J)),j,s.message.length>0?(d(),c("div",{key:0,class:p({"alert alert-success":s.messageType=="success","alert alert-danger":s.messageType=="danger"}),role:"alert"},_(s.message),3)):m("",!0),e("div",q,[a(e("input",{"onUpdate:modelValue":o[0]||(o[0]=l=>s.data.first_name=l),type:"text",class:"form-control",id:"floatingInput",placeholder:"First Name"},null,512),[[i,s.data.first_name]]),A]),e("div",G,[a(e("input",{"onUpdate:modelValue":o[1]||(o[1]=l=>s.data.last_name=l),type:"text",class:"form-control",id:"floatingInput",placeholder:"Last Name"},null,512),[[i,s.data.last_name]]),H]),e("div",K,[a(e("input",{"onUpdate:modelValue":o[2]||(o[2]=l=>s.data.email=l),type:"email",class:"form-control",id:"floatingInput",placeholder:"Email"},null,512),[[i,s.data.email]]),O]),e("div",Q,[a(e("input",{"onUpdate:modelValue":o[3]||(o[3]=l=>s.data.password=l),type:"password",class:"form-control",id:"floatingPassword",placeholder:"Password"},null,512),[[i,s.data.password]]),R]),W,e("button",{onClick:o[4]||(o[4]=l=>r.doSignup()),class:"w-100 btn btn-lg btn-danger",type:"submit"},"Signup")])])])}var ee=u(b,[["render",X],["__scopeId","data-v-edb1ce32"]]);export{ee as default};
