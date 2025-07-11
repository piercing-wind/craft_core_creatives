gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', function() {
    // Detect mobile
    const isMobile = window.innerWidth < 768;

    // HERO TEXT
    gsap.set('.hero-text', {
        fontWeight: isMobile ? 500 : 200,
        color: isMobile ? '#ffffff' : '#6b7280',
        opacity: isMobile ? 1 : 0,
        scale: isMobile ? 0.95 : 0.85,
        delay: isMobile ? 0 : 0.2,
    });

    // On load: Animate visible hero-texts (in viewport)
    if (!isMobile) {
        // Scroll-triggered zoom/slide (scrubbed, not toggled)
        document.querySelectorAll('.hero-text').forEach((text) => {
            gsap.to(text, {
                scale: 1,
                y: 0,
                opacity: 1,
                fontWeight: 500,
                color: '#ffffff',
                scrollTrigger: {
                    trigger: text,
                    start: "top 65%",
                    end: "bottom 35%",
                    scrub: true,
                    onUpdate: self => {
                        // Map progress (0 to 1) to scale/y/opacity
                        // When out of focus (top or bottom), zoom out and fade
                        const p = self.progress;
                        
                        let fade = Math.cos((p - 0.5) * Math.PI) ** 2;
                        let scale = 0.85 + 0.15 * fade; // 1 at center, 0.92 at ends
                        let y = 40 * (1 - fade); // 0 at center, 40 at ends
                        let weight = 200 + 300 * fade; // 500 at center, 200 at ends
                        let color = fade > 0.5 ? "#ffffff" : "#6b7280";

                        gsap.set(text, {
                            scale: scale,
                            y: y,
                            opacity: fade,
                            fontWeight: weight,
                            color: color
                        });
                    }
                }
            });
        });
    }


      document.querySelectorAll('.hero-text').forEach((el, i) => {
         if (isMobile) {
            gsap.set(el, { y: 0, opacity: 1 });
         } else {
            gsap.set(el, { y: 40, opacity: 0 });
            ScrollTrigger.create({
                  trigger: el,
                  start: "top 65%",
                  end: "bottom 35%",
                  onEnter: () => {
                     gsap.to(el, {
                        y: 0,
                        opacity: 1,
                        duration: 1.1,
                        delay: 0.2 + i * 0.18, 
                        ease: "power4.out"
                     });
                  },
                  once: true 
            });
         }
      });

       //Hero Box
       document.querySelectorAll('.hero-box').forEach((el, i) => {
        if (isMobile) {
            gsap.set(el, { y: 0, opacity: 1 });
        } else {
            gsap.set(el, { y: 60, opacity: 0 });
            gsap.to(el, {
                y: 0,
                opacity: 1,
                duration: 4,
                delay: i * 0.15,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: el,
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });
        }
    });

    // PROJECT CARD SLIDE ANIMATION
    document.querySelectorAll('.project-card').forEach(card => {
        const heading = card.querySelector('.project-heading');
        const img = card.querySelector('.project-img');
        if (isMobile) {
            gsap.set(heading, { x: 0 });
            gsap.set(img, { opacity: 1 });
        } else {
            gsap.set(heading, { x: '0%' });
            gsap.set(img, { opacity: 0 });

            card.addEventListener('mouseenter', () => {
                gsap.to(heading, {
                    x: '150%',
                    duration: 0.7,
                    ease: "power3.out"
                });
                gsap.to(img, {
                    opacity: 1,
                    duration: 0.7,
                    ease: "power2.out"
                });
            });

            card.addEventListener('mouseleave', () => {
                gsap.to(heading, {
                    x: '0%',
                    duration: 0.7,
                    ease: "power3.in"
                });
                gsap.to(img, {
                    opacity: 0,
                    duration: 0.7,
                    ease: "power2.in"
                });
            });
        }
    });

    // STAT ANIMATION
    document.querySelectorAll('.stat-card').forEach((card, i) => {
        if (isMobile) {
            gsap.set(card, { scale: 1, opacity: 1 });
        } else {
            gsap.set(card, { scale: 0.7, opacity: 0 });
            gsap.to(card, {
                scale: 1,
                opacity: 1,
                duration: 0.7,
                delay: i * 0.2,
                ease: "back.out(1.7)",
                scrollTrigger: {
                    trigger: card,
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });
        }
    });

    // SLIDE UP TEXT
    document.querySelectorAll('.slideup-text').forEach((el, i) => {
        if (isMobile) {
            gsap.set(el, { y: 0, opacity: 1 });
        } else {
            gsap.set(el, { y: 40, opacity: 0 });
            gsap.to(el, {
                y: 0,
                opacity: 1,
                duration: 0.7,
                delay: i * 0.15,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: el,
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });
        }
    });

    // FLIP-UP IMAGES
    document.querySelectorAll('.flipup-img').forEach((img, i) => {
        if (isMobile) {
            gsap.set(img, { rotateX: 0, opacity: 1 });
        } else {
            gsap.set(img, { rotateX: 90, opacity: 0 });
            gsap.to(img, {
                rotateX: 0,
                opacity: 1,
                duration: 0.8,
                delay: i * 0.15,
                ease: "back.out(1.7)",
                scrollTrigger: {
                    trigger: img,
                    start: "top 60%",
                    toggleActions: "play none none none"
                }
            });
        }
    });

    // POP-UP ANIMATION
    document.querySelectorAll('.popup-anim').forEach((el, i) => {
        if (isMobile) {
            gsap.set(el, { scale: 1, opacity: 1 });
        } else {
            gsap.set(el, { scale: 0.7, opacity: 0 });
            gsap.to(el, {
                scale: 1,
                opacity: 1,
                duration: 0.7,
                delay: i * 0.15,
                ease: "back.out(1.7)",
                scrollTrigger: {
                    trigger: el,
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });
        }
    });

    // ABOUT PAGE ANIMATIONS
    // Fade in animation
    document.querySelectorAll('.fade-in').forEach((element, i) => {
        if (isMobile) {
            gsap.set(element, { y: 0, opacity: 1 });
        } else {
            gsap.set(element, { y: 50, opacity: 0 });
            gsap.to(element, {
                y: 0,
                opacity: 1,
                duration: 1.5,
                delay: i * 0.15,
                ease: 'power3.out'
            });
        }
    });

    // Slide up animations
    document.querySelectorAll('.slide-up').forEach((element, i) => {
        if (isMobile) {
            gsap.set(element, { y: 0, opacity: 1 });
        } else {
            gsap.set(element, { y: 50, opacity: 0 });
            gsap.to(element, {
                y: 0,
                opacity: 1,
                duration: 1,
                delay: i * 0.15,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: element,
                    start: 'top 80%',
                    toggleActions: "play none none none"
                }
            });
        }
    });

    // Slide left animations
    document.querySelectorAll('.slide-left').forEach((element, i) => {
        if (isMobile) {
            gsap.set(element, { x: 0, opacity: 1 });
        } else {
            gsap.set(element, { x: -50, opacity: 0 });
            gsap.to(element, {
                x: 0,
                opacity: 1,
                duration: 1,
                delay: i * 0.15,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: element,
                    start: 'top 80%',
                    toggleActions: "play none none none"
                }
            });
        }
    });

    // Slide right animations
    document.querySelectorAll('.slide-right').forEach((element, i) => {
        if (isMobile) {
            gsap.set(element, { x: 0, opacity: 1 });
        } else {
            gsap.set(element, { x: 50, opacity: 0 });
            gsap.to(element, {
                x: 0,
                opacity: 1,
                duration: 1,
                delay: i * 0.15,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: element,
                    start: 'top 80%',
                    toggleActions: "play none none none"
                }
            });
        }
    });

    // Card hover effects (desktop only)
    if (!isMobile) {
        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('mouseenter', () => {
                gsap.to(card, {
                    duration: 0.3,
                    y: -10,
                    scale: 1.02,
                    ease: 'power2.out'
                });
            });
            
            card.addEventListener('mouseleave', () => {
                gsap.to(card, {
                    duration: 0.3,
                    y: 0,
                    scale: 1,
                    ease: 'power2.out'
                });
            });
        });
    }
});