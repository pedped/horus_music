import{s as _}from"./Sidebar.js";import{_ as h,r as p,a as g,j as m,o as s,c as a,b as e,k as b,F as v,h as y,d as n,p as k,e as f,t as c,i as w}from"./index.js";const L={data(){return{musicList:[]}},components:{sidebar:_},methods:{viewMusic(t){p.push("/admin/music/view/"+t.id)},loadMusicList(){let t=new FormData;t.set("auth_user_id",localStorage.getItem("userId")),t.set("auth_user_token",localStorage.getItem("token")),g.post("/admin/music/list",t).then(i=>{console.log(i.data),i.data!=null?this.musicList=i.data:i.data.error!=null?(this.message=i.data.error,this.messageType="danger"):(this.message="Unknown error happened",this.messageType="danger")}).catch(i=>{this.message="an error occurred",this.messageType="danger"})}},mounted(){this.loadMusicList()}},r=t=>(k("data-v-c33ec30a"),t=t(),f(),t),x={class:"container cont"},S={class:"row"},M={class:"col-md-3"},N={class:"col-md-9"},T={class:"row"},V={class:"col-md-12"},C=r(()=>e("h3",{style:{"margin-top":"36px","margin-bottom":"24px"}},"Musics",-1)),F={key:0,class:"table table-dark table-striped"},B=r(()=>e("tr",null,[e("th",null," Music Title "),e("th",null," Genre "),e("th",null," File "),e("th",null," Status "),e("th",null," Action ")],-1)),D={controls:"",style:{width:"100%"}},j=["src"],A=w(" Your browser does not support the audio element. "),U={key:0,class:"badge bg-primary"},$={key:1,class:"badge bg-danger"},z={key:2,class:"badge bg-success"},E={key:3,class:"badge bg-danger"},G=["onClick"],P={key:1};function R(t,i,Y,q,d,l){const u=m("sidebar");return s(),a("div",x,[e("div",S,[e("div",M,[b(u)]),e("div",N,[e("div",T,[e("div",V,[C,d.musicList.length>0?(s(),a("table",F,[B,(s(!0),a(v,null,y(this.musicList,o=>(s(),a("tr",null,[e("td",null,c(o.title),1),e("td",null,c(o.genre),1),e("td",null,[e("audio",D,[e("source",{src:o.musicLink,type:"audio/mpeg"},null,8,j),A])]),e("td",null,[o.status==1?(s(),a("span",U," Uploaded ")):n("",!0),o.status==2?(s(),a("span",$," Rejected ")):n("",!0),o.status==3?(s(),a("span",z," Approved ")):n("",!0),o.status==4?(s(),a("span",E," Published ")):n("",!0)]),e("td",null,[e("button",{onClick:H=>l.viewMusic(o),class:"btn btn-primary"},"View",8,G)])]))),256))])):n("",!0),d.musicList.length==0?(s(),a("p",P,"No music uploaded at this time")):n("",!0)])])])])])}var K=h(L,[["render",R],["__scopeId","data-v-c33ec30a"]]);export{K as default};