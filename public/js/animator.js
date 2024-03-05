class AnimationEffectFactory {
    constructor(planeFunction, effectFunction) {
        this.planeFunction = planeFunction;
        this.effectFunction = effectFunction;
    }

    createEffect(progress) {
        return this.effectFunction(this.planeFunction(progress));
    }
}
class Animator {
    constructor(element) {
        this.element = element;
        this.isPaused = false;
        this.frameId = null;
        this.timingFunctions = {
            'linear': new AnimationEffectFactory(progress => progress, progress => progress),
            'spin': new AnimationEffectFactory(progress => progress * 360, progress => progress),
            ...this._easeAnimations(),
            ...this._flashAnimations(),
            ...this._slideAnimations(),
            ...this._zoomAnimations(),
            ...this._flipAnimations(),
            ...this._cubicBezierAnimations(),
        };
    }

    _easeAnimations() {
        return {
            'easeIn': new AnimationEffectFactory(progress => progress ** 3, progress => progress),
            'easeOut': new AnimationEffectFactory(progress => --progress * progress * progress + 1, progress => progress),
            'easeInOut': new AnimationEffectFactory(progress => progress < 0.5 ? 4 * progress ** 3 : 1 - (-2 * progress + 2) ** 3 / 2, progress => progress)
        };
    }
    _flashAnimations() {
        return {
            'flash': new AnimationEffectFactory(progress => Math.sin(progress * Math.PI * 2) * (1 - progress), progress => progress)
        };
    }

    _slideAnimations() {
        return {
            'slideUp': new AnimationEffectFactory(progress => 1 - Math.sin(progress * Math.PI / 2), progress => progress),
            'slideDown': new AnimationEffectFactory(progress => Math.cos(progress * Math.PI / 2), progress => progress),
            'slideLeft': new AnimationEffectFactory(progress => 1 - Math.sin(progress * Math.PI / 2), progress => progress),
            'slideRight': new AnimationEffectFactory(progress => Math.cos(progress * Math.PI / 2), progress => progress)
        };
    }

    _zoomAnimations() {
        return {
            'zoomIn': new AnimationEffectFactory(progress => 1 - Math.sin(progress * Math.PI / 2), progress => progress),
            'zoomOut': new AnimationEffectFactory(progress => Math.cos(progress * Math.PI / 2), progress => progress)
        };
    }

    _flipAnimations() {
        return {
            'flipX': new AnimationEffectFactory(progress => Math.sin(progress * Math.PI), progress => progress),
            'flipY': new AnimationEffectFactory(progress => Math.cos(progress * Math.PI), progress => progress)
        };
    }

    _cubicBezierAnimations() {
        return {
            'cubicBezierEaseIn': new AnimationEffectFactory(this._cubicBezier(0.42, 0, 1, 1), progress => progress),
            'cubicBezierEaseOut': new AnimationEffectFactory(this._cubicBezier(0, 0, 0.58, 1), progress => progress),
            'cubicBezierEaseInOut': new AnimationEffectFactory(this._cubicBezier(0.42, 0, 0.58, 1), progress => progress)
        };
    }

    _cubicBezier(p1x, p1y, p2x, p2y) {
        return function(progress) {
            const t = progress;
            const u = 1 - t;
            // Équation cubic bezier pour X and Y
            const bx = 3 * u * u * t * p1x + 3 * u * t * t * p2x + t * t * t;
            const by = 3 * u * u * t * p1y + 3 * u * t * t * p2y + t * t * t;
            return bx * by;
        };
    }

    animate(cssProperty, to, duration, timingFunction = 'linear') {
        const startValue = parseInt(this.element.style[cssProperty]) || 0;
        const changeInValue = to - startValue;
        const startTime = Date.now();
        // Obtient l'objet AnimationEffectFactory pour la fonction de timing sélectionnée.
        const effectFactory = this.timingFunctions[timingFunction] || this.timingFunctions['linear'];

        const step = () => {
            if (!this.isPaused) {
                const timeElapsed = Date.now() - startTime;
                let progress = timeElapsed / duration;
                progress = progress > 1 ? 1 : progress;

                // Utilise la fonction de plan (planeFunction) pour calculer le progrès ajusté.
                const adjustedProgress = effectFactory.planeFunction(progress);
                // Applique ensuite la fonction d'effet pour obtenir la valeur finale à appliquer.
                const effectValue = effectFactory.createEffect(adjustedProgress);

                const currentValue = startValue + changeInValue * effectValue;
                this.element.style[cssProperty] = `${currentValue}px`;

                if (timeElapsed < duration) {
                    this.frameId = requestAnimationFrame(step);
                }
            }
        };

        this.frameId = requestAnimationFrame(step);
    }

    step() {
        if (!this.isPaused) {
            let timeElapsed = Date.now() - this.start;
            let progress = timeElapsed / this.duration;

            // Apply the selected timing function
            progress = this.timingFunctions(progress);

            const current = this.from + (this.to - this.from) * progress;
            this.element.style[this.cssProperty] = `${current}px`;
            if (timeElapsed < this._duration) {
                this.frameId = requestAnimationFrame(() => this.step());
            }
        }
    }

    pause() {
        this.isPaused = true;
        cancelAnimationFrame(this.frameId);
    }

    resume() {
        this.isPaused = false;
        this.start += Date.now() - this.start;
        this.frameId = requestAnimationFrame(() => this.step());
    }

    reset() {
        this.isPaused = true;
        this.start = null;
        this.frameId = null;
        this.element.style[this.cssProperty] = `${this.from}px`;
    }
}

window.Animator = Animator;