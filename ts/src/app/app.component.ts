import { Component } from '@angular/core';
import { Box } from './enum/Box.enum';
import { ICommentSave } from './interface/IComment.interfaces';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})

export class AppComponent {
  title = 'DevChuva';
  commentObject = {
    title: "",
    comment: ""
  } as ICommentSave;
  box = Box.CREATE;
  commentsList : Array<ICommentSave> = [{
    title: "Título do tópico",
    username :"Carlos Henrique Santos",
    comment: "Comecinho da pergunta aparece aqui resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo..." ,
    likes : 1,
    answers: 1
  }, {
    title: "Título do tópico",
    username :"Carlos Henrique Santos",
    comment: "Comecinho da pergunta aparece aqui resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo..." ,
    likes : 4,
    answers: 4
  }
]

  mockResumeText = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae turpis auctor, mollis felis ut, commodo turpis. Phasellus felis mauris, egestas eget cursus et, iaculis quis lacus. Fusce auctor eros sed magna ultricies gravida. Etiam aliquam dictum nisl, vel aliquet enim accumsan sit amet. Donec finibus nisi tellus, ut viverra lorem vestibulum ut. Phasellus condimentum orci id leo condimentum lobortis et non lorem. Sed id nisl metus. Quisque sollicitudin ligula in sapien scelerisque, ac gravida eros vestibulum.  Fusce vitae luctus dui. Donec id euismod mauris, in volutpat urna. Proin dapibus consequat feugiat. Proin dictum justo arcu, quis vestibulum augue lacinia quis. Sed dignissim dui nulla, ut faucibus mauris sodales id. Aliquam erat volutpat. Maecenas dolor enim, tincidunt id elit non, suscipit interdum turpis. Etiam finibus urna libero, eget interdum eros volutpat ullamcorper. Pellentesque et pretium lorem. Aenean interdum quis diam ac porttitor. Cras nec ipsum pulvinar, pharetra libero non, ornare enim. Etiam in laoreet odio.Nam eget tristique elit, at fermentum tellus. Mauris scelerisque ligula id eleifend feugiat. Donec eleifend vehicula sem nec dapibus. Integer scelerisque neque dui, in lacinia erat molestie eu. Phasellus maximus dui eget lacus porta tempor. Ut ex nibh, dignissim quis purus semper, efficitur facilisis turpis. Praesent blandit elementum ultricies. Aliquam sit amet enim sit amet nulla pulvinar lobortis consectetur non odio. Phasellus at lacus hendrerit, vulputate nisi sit amet, viverra mauris. Etiam eu scelerisque orci. Quisque sagittis, mi vitae pharetra iaculis, orci elit eleifend massa, eu posuere mauris odio id odio. Morbi eu libero luctus, consectetur lorem vel, interdum sapien. Aenean in porta arcu. Maecenas eu maximus massa.Praesent velit dolor, dignissim sed quam ac, efficitur porta justo. Pellentesque porta pharetra felis ut hendrerit. Nulla facilisi. Aliquam erat volutpat. Nunc sit amet faucibus quam. Maecenas dapibus luctus dolor at viverra. Duis nec fringilla libero. Duis risus nibh, viverra ac orci nec, iaculis dictum sem. Aliquam at malesuada arcu. Aliquam erat volutpat. Donec varius ipsum purus, ut vehicula purus placerat vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit."

  resumeText = this.mockResumeText.substring(0, 524);

  setResumeString(): void {
    let anchor = document.querySelector('.btn-show-more') as HTMLElement;
    if(this.resumeText.length > 524) {
      this.resumeText = this.mockResumeText.substring(0, 524);
      anchor.innerText = "ver mais"
      return;
    }
    this.resumeText = this.mockResumeText;
    anchor.innerText = "ver menos";
  }

  setFormVisible(): void{
    this.box = Box.FORM;
    let anchor = document.querySelector('.btn-create-topic') as HTMLElement;
    let span = anchor.querySelector('span')  as HTMLElement;
    span.innerHTML = "criar novo tópico";
  }

  setLastVisible(): void{
    this.box = Box.LAST;
  }

  verifyForm(): string {
    if(this.box == Box.FORM) return "occult";
    return "visible";
  }

  addComment(): void{
    let {title, comment} = this.commentObject;
    if(title != "" || comment != "") {
      this.commentsList.unshift({
      title,
      comment,
      answers: 1,
      likes: 0,
      username: "You"
    })
    this.setLastVisible();;
    this.cleanFields();
    return;
    }
    alert("Não é possível criar tópicos vazios");
  }

  cleanFields(){
    this.commentObject.title = "";
    this.commentObject.comment = "";
  }
}
