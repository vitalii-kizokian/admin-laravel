export const interval = (callback, delay) => {
    let timerId = delay;
    let remaining = delay;
    let start = new Date();
    const resume = () => {
        start = new Date();
        timerId = window.setTimeout(() => {
            remaining = delay;
            resume();
            callback();
        }, remaining);
    };
    const pause = () => {
        window.clearTimeout(timerId);
        remaining -= new Date().getTime() - start.getTime();
    };
    resume();
    return { pause, resume };
};
export default interval;
//# sourceMappingURL=interval.js.map