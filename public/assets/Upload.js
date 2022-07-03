import{_ as m,a as p,o as c,c as n,b as e,n as v,t as _,d as g,w as d,v as u,g as h,p as b,e as y,f}from"./index.js";const x={data(){return{data:{musicTitle:null,musicGenre:null,musicLyrics:null},message:"",messageType:"success"}},methods:{uploadFile(){this.message="";let s=new FormData,a=document.querySelector("#file");s.append("music",a.files[0]),s.set("auth_user_id",localStorage.getItem("userId")),s.set("auth_user_token",localStorage.getItem("token")),s.set("music_title",this.data.musicTitle),s.set("music_genre",this.data.musicGenre),s.set("music_lyrics",this.data.musicLyrics),p.post("/music/upload",s).then(l=>{console.log("upload file",l.data),l.data.musicId!=null?(this.message="Music file uploaded successfully, you can check publishing status from My Musics menu",this.messageType="success"):l.data.error!=null?(this.message=l.data.error,this.messageType="danger"):(this.message="Unknown error happened",this.messageType="danger")}).catch(l=>{this.message="an error occured",this.messageType="danger"})}},mounted(){}},o=s=>(b("data-v-23f8f084"),s=s(),y(),s),k={class:"upload-page"},T={class:"container"},w=o(()=>e("div",{class:"py-5 text-center"},[e("h2",null,"Upload your enormous music"),e("p",{class:"lead"},"Please fill all information listed below")],-1)),S={class:"row g-5"},q={class:"col-md-12"},I={class:"row g-5"},M={class:"col-md-12 col-lg-12"},U={class:"needs-validation",novalidate:""},V={class:"row g-3"},L={class:"col-sm-6"},z=o(()=>e("label",{for:"musicTitle",class:"form-label"},"Music Title",-1)),C=o(()=>e("div",{class:"invalid-feedback"}," Valid title is required. ",-1)),F={class:"col-sm-6"},G=o(()=>e("label",{for:"state",class:"form-label"},"Music Genre",-1)),B=f('<option value="blues" data-v-23f8f084>Blues</option><option value="country" data-v-23f8f084>Country</option><option value="jazz" data-v-23f8f084>Jazz</option><option value="pop" data-v-23f8f084>Pop</option><option value="rock" data-v-23f8f084>Rock</option>',5),D=[B],N=o(()=>e("div",{class:"invalid-feedback"}," Please provide a valid music genre. ",-1)),P={class:"col-12"},Y=o(()=>e("label",{for:"lyrics",class:"form-label"},"Lyrics",-1)),j={class:"input-group has-validation"},E=o(()=>e("div",{class:"invalid-feedback"}," Your username is required. ",-1)),J=f('<div class="col-12" data-v-23f8f084><label for="lyrics" class="form-label" data-v-23f8f084>Choose music file</label><div class="input-group has-validation" data-v-23f8f084><input type="file" class="form-control" id="file" required data-v-23f8f084><div class="invalid-feedback" data-v-23f8f084> Your username is required. </div></div></div>',1),R=o(()=>e("hr",{class:"my-4"},null,-1));function A(s,a,l,H,t,r){return c(),n("div",k,[e("div",T,[e("main",null,[w,e("div",S,[e("div",q,[t.message.length>0?(c(),n("div",{key:0,class:v({"alert alert-success":t.messageType=="success","alert alert-danger":t.messageType=="danger"}),role:"alert"},_(t.message),3)):g("",!0)])]),e("div",I,[e("div",M,[e("div",U,[e("div",V,[e("div",L,[z,d(e("input",{"onUpdate:modelValue":a[0]||(a[0]=i=>t.data.musicTitle=i),type:"text",class:"form-control",required:""},null,512),[[u,t.data.musicTitle]]),C]),e("div",F,[G,d(e("select",{"onUpdate:modelValue":a[1]||(a[1]=i=>t.data.musicGenre=i),class:"form-select",required:""},D,512),[[h,t.data.musicGenre]]),N]),e("div",P,[Y,e("div",j,[d(e("textarea",{"onUpdate:modelValue":a[2]||(a[2]=i=>t.data.musicLyrics=i),rows:"8",type:"text",class:"form-control",id:"lyrics",placeholder:"Lyrics",required:""},null,512),[[u,t.data.musicLyrics]]),E])]),J]),R,e("button",{onClick:a[3]||(a[3]=(...i)=>r.uploadFile&&r.uploadFile(...i)),class:"w-100 btn btn-danger btn-lg",type:"submit"},"Upload Music")])])])])])])}var O=m(x,[["render",A],["__scopeId","data-v-23f8f084"]]);export{O as default};
